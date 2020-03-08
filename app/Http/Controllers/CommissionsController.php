<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Csv;
use App\Expenses;
use App\Commissions;
use App\Pms;
use App\Libs\Commission;
use App\Libs\SaveMethod;
use App\Libs\CreateHtml;
use App\Libs\Root;

class CommissionsController extends Controller
{

  //フォーム用配列
  private $nominal;
  private $nominal19;
  private $nominalForRoot;
  private $service;


    /*
  |--------------------------------------------------------------------------
  | コンストラクタ
  |--------------------------------------------------------------------------
*/
  public function __construct(){
    $this->nominal = ['---', '仲介手数料', '広告料', '契約金等', '管理報酬', '業務委託料'];
    $this->nominal19 = ['---', '契約金', '家賃', '火災保険', '紹介料', 'その他'];
    $this->nominalForRoot = ['---', '仲介手数料', '広告料', '契約金等', '管理報酬', '業務委託料', '紹介料', '預かり手付金', '社債返還', '社債利息', '受取利息', 'その他', '諸口'];
    $this->service = ['---', '賃貸', '売買', '物件管理', 'その他'];
  }

 /*
  |--------------------------------------------------------------------------
  | 日時計算
  |--------------------------------------------------------------------------
*/
  public function showDayTime(){
    $now_year = session('year');
    $now_month = session('month');
    $search_month = $now_month - 1;
    $now_day = session('day');
    if ($now_month == 1) {
      $date = $now_year - 1 . '-12';
    } else {
      $date = $now_year . '-' . $search_month;
    }
    return [$now_year, $now_month, $now_day, $search_month, $date];
  }

  /*
  |--------------------------------------------------------------------------
  | Topページ表示
  |--------------------------------------------------------------------------
*/
  public function getTop()
  {

    list($now_year, $now_month, $now_day, $search_month, $date) = $this->showDayTime();
    $user_name = Auth::user()->name;
    $dates_instance = new Commission\GetDatas;
    $userList = $dates_instance->userList();
    $userIDList = $dates_instance->userIDList();
    // 全体の配分表検索
    $allList = $dates_instance->allList($date);
    // dd($allList[0]->csv->price);
    $allSum = $dates_instance->allSubtotal($date, $userList);

    // ①合計検索
    $totalSum = $dates_instance->allTotal($date, $userList);

    //②立替経費の取得
    $expense = $dates_instance->expense($now_year, $now_month, $userIDList);

    //③合計から立替経費を引く(①−②)
    $rewardArray = [];
    if (isset($totalSum[7][0])) {
      for ($i = 0; $i < count($expense[9]); $i++) {
        $rewardArray[] = intval($totalSum[7][$i]) - $expense[9][$i];
      }
    }

    //④源泉の計算
    if (isset($totalSum[7][0])) {
      $tax = $dates_instance->tax($now_year, $now_month, $userIDList, $totalSum[7]);
    } else {
      $tax = [];
    }

    //⑤振込額算出(③ー④)
    $btArray = [];
    if (isset($totalSum[7][0])) {
      for ($j = 0; $j < count($tax); $j++) {
        $bt = intval($rewardArray[$j]) - $tax[$j];
        if ($bt < 0) {
          $btArray[] = 0;
        } else {
          $btArray[] = $bt;
        }
      }
    }
// $data = session('year');
    // dd(session()->all());
    return view('commissions.all', compact('now_year', 'now_month', 'now_day', 'userList', 'allList', 'allSum', 'totalSum', 'expense', 'rewardArray', 'tax', 'btArray'));
  }


  /*
  |--------------------------------------------------------------------------
  | 17口座チェックページ表示
  |--------------------------------------------------------------------------
*/
  public function getCSV17()
  {
    if(session('month') == 1){
      $now_year = session('year') - 1;
      $now_month = 12;
    }else{
      $now_year = session('year');
      $now_month = session('month') - 1;
    }

    $now_day = session('day');
    $nominal = $this->nominal;
    $service = $this->service;
    $user_name = Auth::user()->name;
    $dates_instance = new Commission\GetDatas;
    $userList = $dates_instance->userList();
    $csvDatas = Csv::where('bank_number', '=', 17)->where('year', '=', $now_year)->where('month', '=', $now_month )->get()->ToArray();
    $jsArray = [];
    foreach( $csvDatas as $csv){
      $jsArray[] = $csv['id'];
    }
    // dd($userList);
    return view('commissions.csv17', compact('now_year', 'now_month', 'now_day', 'nominal', 'service', 'csvDatas', 'user_name', 'userList', 'jsArray'));
  }


  //年月検索用
  public function postSearchCSV17(Request $request)
  {
    if (isset($request->search)) {
      $year = substr($request->date, 0, 4);
      $month = intval(substr($request->date, 5));
      $day = '30';
    } else {
      $dt = Carbon::now();
      $year = $dt->year;
      $month = $dt->month;
      $day = $dt->day;
    }
    session()->put(['year' => $year, 'month' => $month, 'day' => $day]);
    return redirect()->route('commissions.com_csv17', compact('year', 'month', 'day'));
  }


  /*
  |--------------------------------------------------------------------------
  | 17口座チェック　更新
  |--------------------------------------------------------------------------
*/
  public function postCSV17(Request $request)
  {
    $year = $request->year;
    $month = $request->month;
    $day = $request->day;
    $user_name = Auth::user()->name;
    $csv_count = Csv::where('bank_number', '=', 17)->where('year', '=', $year)->where('month', '=', $month)->count();
    $first = Csv::where('bank_number', '=', 17)->where('year', '=', $year)->where('month', '=', $month)->first(['id']);
    $first_id = $first->id;
    for ($i = $first_id; $i < $first_id + $csv_count; $i++) {
      $id = $request->id[$i];
      $nominal = $request->nominal[$i];
      $person = $request->person[$i];
      $service = $request->service[$i];
      $remark = ($request->remark[$i] == "") ? "" : $request->remark[$i];
      $csv_array = [
        'id' => $id,
        'nominal' => $nominal,
        'person' => $person,
        'service' => $service,
        'remark' => $remark
      ];

      // アップデート処理
      //CsvTable
      Csv::where('id', '=', $id)->update($csv_array);

      //CommisionsTable
      $bf_fee = 0;
      $b_fee_date = null;
      $ad_fee = 0;
      $ad_date = null;
      $ap_fee = 0;
      $ap_date = null;
      $out_fee = 0;
      $out_date = null;
      if ($nominal == '仲介手数料') {
        $bf_fee = str_replace(',', '', $request->price[$i]);
        $b_fee_date = $request->date[$i];
      }
      if ($nominal == '契約金等') {
        $bf_fee = str_replace(',', '', $request->price[$i]);
        $b_fee_date = $request->date[$i];
      }
      if ($nominal == '広告料') {
        $ad_fee = str_replace(',', '', $request->price[$i]);
        $ad_date = $request->date[$i];
      }
      if ($nominal == '管理報酬') {
        $ap_fee = str_replace(',', '', $request->price[$i]);
        $ap_date = $request->date[$i];
      }
      if ($nominal == '業務委託料'){
        $out_fee = str_replace(',', '', $request->price[$i]);
        $out_date = $request->date[$i];
      }
      // dd($b_fee_date);
      $com_update = ['user_id' => $person,
        'brokerage_fee' => $bf_fee,
        'b_fee_date' => $b_fee_date,
        'advertising_fee' => $ad_fee,
        'ad_date' => $ad_date,
        'am_pm_fee' => $ap_fee,
        'am_pm_fee_date' => $ap_date,
        'outsourcing_fee' => $out_fee,
        'o_fee_date' => $out_date,
        'service' => $service];
      Commissions::where('csv_id', '=', $id)->first()->fill($com_update)->save();

    }

    $dt = Carbon::now();
    $now_year = $dt->year;
    $now_month = $dt->month;
    $now_day = $dt->day;
    return redirect()->route('commissions.com_csv17', compact('now_year', 'now_month', 'now_day'));
  }


 /*
  |--------------------------------------------------------------------------
  | 19口座チェックページ表示
  |--------------------------------------------------------------------------
*/
  public function getCSV19()
  {
    if(session('month') == 1){
      $now_year = session('year') - 1;
      $now_month = 12;
    }else{
      $now_year = session('year');
      $now_month = session('month') - 1;
    }

    $now_day = session('day');
    $nominal = $this->nominal19;
    $service = $this->service;
    $user_name = Auth::user()->name;
    $dates_instance = new Commission\GetDatas;
    $userList = $dates_instance->userList();
    $csvDatas = Csv::where('bank_number', '=', 19)->where('year', '=', $now_year)->where('month', '=', $now_month )->get()->ToArray();
    $jsArray = [];
    foreach( $csvDatas as $csv){
      $jsArray[] = $csv['id'];
    }
    // dd(session()->all());
    return view('commissions.csv19', compact('now_year', 'now_month', 'now_day', 'nominal', 'service', 'csvDatas', 'user_name', 'userList', 'jsArray'));
  }


  //年月検索用
  public function postSearchCSV19(Request $request)
  {
    if (isset($request->search)) {
      $year = substr($request->date, 0, 4);
      $month = intval(substr($request->date, 5));
      $day = '30';
    } else {
      $dt = Carbon::now();
      $year = $dt->year;
      $month = $dt->month;
      $day = $dt->day;
    }
    session()->put(['year' => $year, 'month' => $month, 'day' => $day]);
    return redirect()->route('commissions.com_csv19', compact('year', 'month', 'day'));
  }


 /*
  |--------------------------------------------------------------------------
  | 19口座チェック　更新
  |--------------------------------------------------------------------------
*/
  public function postCSV19(Request $request)
  {
    $year = $request->year;
    $month = $request->month;
    $day = $request->day;
    $user_name = Auth::user()->name;
    $csv_count = Csv::where('bank_number', '=', 19)->where('year', '=', $year)->where('month', '=', $month)->count();
    $first = Csv::where('bank_number', '=', 19)->where('year', '=', $year)->where('month', '=', $month)->first(['id']);
    $first_id = $first->id;
    for ($i = $first_id; $i < $first_id + $csv_count; $i++) {
      $id = $request->id[$i];
      $nominal = $request->nominal[$i];
      $person = $request->person[$i];
      $service = $request->service[$i];
      $remark = ($request->remark[$i] == "") ? "" : $request->remark[$i];
      $csv_array = [
        'id' => $id,
        'nominal' => $nominal,
        'person' => $person,
        'service' => $service,
        'remark' => $remark
      ];

      // アップデート処理
      //CsvTable
      Csv::where('id', '=', $id)->update($csv_array);

      //CommisionsTable
      $bf_fee = 0;
      $b_fee_date = null;
      $ad_fee = 0;
      $ad_date = null;
      $ap_fee = 0;
      $ap_date = null;
      $out_fee = 0;
      $out_date = null;
      // dd($b_fee_date);
      $com_update = ['user_id' => $person,
        'brokerage_fee' => $bf_fee,
        'b_fee_date' => $b_fee_date,
        'advertising_fee' => $ad_fee,
        'ad_date' => $ad_date,
        'am_pm_fee' => $ap_fee,
        'am_pm_fee_date' => $ap_date,
        'outsourcing_fee' => $out_fee,
        'o_fee_date' => $out_date,
        'service' => $service];
      Commissions::where('csv_id', '=', $id)->first()->fill($com_update)->save();

    }

    $dt = Carbon::now();
    $now_year = $dt->year;
    $now_month = $dt->month;
    $now_day = $dt->day;
    return redirect()->route('commissions.com_csv19', compact('now_year', 'now_month', 'now_day'));
  }




  /*
  |--------------------------------------------------------------------------
  | 個別売上ページトップ
  |--------------------------------------------------------------------------
*/
  public function getIndividuals()
  {
    $now_year = session('year');
    $now_month = session('month');
    $search_month = $now_month - 1;
    $now_day = session('day');
    if ($now_month == 1) {
      $date = $now_year - 1 . '-12';
    } else {
      $date = $now_year . '-' . $search_month;
    }
    $user_name = Auth::user()->name;
    $dates_instance = new Commission\GetDatas;
    $userList = $dates_instance->userList();
    // 賃貸部門検索
    $indiviListRent = $dates_instance->indiviList($user_name, '賃貸', $date);
    $rentSum = $dates_instance->indiviSubtotal($user_name, '賃貸', $date, $userList);
    // 売買部門検索
    $indiviListBuy = $dates_instance->indiviList($user_name, '売買', $date);
    $buySum = $dates_instance->indiviSubtotal($user_name, '売買', $date, $userList);
    // 管理部門検索
    $indiviListManage = $dates_instance->indiviList($user_name, '物件管理', $date);
    $manageSum = $dates_instance->indiviSubtotal($user_name, '物件管理', $date, $userList);
    // 業務委託部門検索
    $indiviListOther = $dates_instance->indiviList($user_name, 'その他', $date);
    $otherSum = $dates_instance->indiviSubtotal($user_name, 'その他', $date, $userList);

    // 合計検索
    $totalSum = $dates_instance->indiviTotal($user_name, $date, $userList);

 // マンスリー用
    //賃貸合計
    $monthlyRent = $dates_instance->monthly($rentSum);
    // dd($otherSum);

    return view('commissions.individuals', compact('now_year', 'now_month', 'now_day', 'userList', 'indiviListRent', 'rentSum', 'indiviListBuy', 'buySum', 'indiviListManage', 'manageSum', 'indiviListOther', 'otherSum', 'totalSum'));
  }




  /*
  |--------------------------------------------------------------------------
  | 【賃貸】入力ページトップ
  |--------------------------------------------------------------------------
*/
  public function getRent()
  {
    list($now_year, $now_month, $now_day, $search_month, $date) = $this->showDayTime();
    $user_name = Auth::user()->name;
    $service = $this->service;
    $dates_instance = new Commission\GetDatas;
    $csvDatas = $dates_instance->csvDatas($now_year, $now_month, $user_name, '賃貸');
    $userList = $dates_instance->userList();
    //登録済みデータ
    $registerdList = $dates_instance->relayMethod($user_name, $date, '賃貸');

    // html作成
    $html_instance = new Commission\CreateHtml;
    $rentHtml = $html_instance->rent($csvDatas, $userList) . $html_instance->htmlButton();

    return view('commissions.rent', compact('now_year', 'now_month', 'now_day', 'service', 'csvDatas', 'userList', 'registerdList', 'rentHtml'));
  }

  /*
  |--------------------------------------------------------------------------
  | 【賃貸】入力ページ登録
  |--------------------------------------------------------------------------
*/
  public function postRent(Request $request)
  {

    // SaveMethodに渡してsave
    $dates_instance = new Commission\SaveMethod;
    $dates_instance->commissionDatas($request);

    $now_year = session('year');
    $now_month = session('month');
    $now_day = session('day');
    return redirect()->route('commissions.rent', compact('now_year', 'now_month', 'now_day'));
  }


  /*
  |--------------------------------------------------------------------------
  | 【売買】入力ページトップ
  |--------------------------------------------------------------------------
*/
  public function getTrade()
  {
    list($now_year, $now_month, $now_day, $search_month, $date) = $this->showDayTime();
    $user_name = Auth::user()->name;
    $service = $this->service;
    $dates_instance = new Commission\GetDatas;
    $csvDatas = $dates_instance->csvDatas($now_year, $now_month, $user_name, '売買');
    $userList = $dates_instance->userList();
    //登録済みデータ
    $registerdList = $dates_instance->relayMethod($user_name, $date, '売買');

    // html作成
    $html_instance = new Commission\CreateHtml;
    $tradeHtml = $html_instance->trade($csvDatas, $userList) . $html_instance->htmlButton();

    return view('commissions.trade', compact('now_year', 'now_month', 'now_day', 'service', 'csvDatas', 'userList', 'registerdList', 'tradeHtml'));
  }

  /*
  |--------------------------------------------------------------------------
  | 【売買】入力ページ登録
  |--------------------------------------------------------------------------
*/
  public function postTrade(Request $request)
  {

    // SaveMethodに渡してsave
    $dates_instance = new Commission\SaveMethod;
    $dates_instance->commissionDatas($request);

    $now_year = session('year');
    $now_month = session('month');
    $now_day = session('day');
    return redirect()->route('commissions.trade', compact('now_year', 'now_month', 'now_day'));
  }


  /*
  |--------------------------------------------------------------------------
  | 【管理】入力ページトップ
  |--------------------------------------------------------------------------
*/

  public function arrayChange($array, $str){
    $result = [];
    foreach( $array as $a ){
      $result[] = $a->$str;
    }

    return $result;
  }


  public function getManage()
  {
    list($now_year, $now_month, $now_day, $search_month, $date) = $this->showDayTime();
    $user_name = Auth::user()->name;
    $service = $this->service;
    $dates_instance = new Commission\GetDatas;
    $csvDatas = $dates_instance->csvDatas19($now_year, $now_month, $user_name);
    $userList = $dates_instance->userList();
    //html初期化
    $html19 = '';
    $html_regi = '';
    $html_NoRegi = '';

    // 登録済みデータ(リレーション使用用)
    $registerdList = $dates_instance->relayMethod($user_name, $date, '管理');

  // 【19口座部分】html作成
    $html_instance = new Commission\CreateHtml;
    $html19 = $html_instance->html19($csvDatas, $userList);

  // 登録済みのデータ取得
    $registerdList = Commissions::where('am_pm_fee_date', 'like', '%' . $date . '%')->where('user_id', '=', $user_name)->get();

  // 未登録の物件を検索
    // 担当管理物件の全件数取得（重複は除く）
      $myPmList = Pms::where('person', '=', $user_name)->distinct()->select('property_name')->get();
    // 登録済みデータと全件の差を取得
      $check = count($myPmList) - count($registerdList);
    // 19口座の個数
      $count19 = ( isset($csvDatas) ) ? count($csvDatas) : 0;
    if($check == 0){
      // 登録済みデータを元にHTML化
      $html_regi = $html_instance->FeeHtml($registerdList, $userList, $count19);
    }else{
      // 各配列をマンション名で再度配列化(別Methodにわたす)
      $pmName = $this->arrayChange($myPmList, 'property_name');
      $regiName = $this->arrayChange($registerdList, 'apartment_name');
      // 新しく増えたものを探す
        $result2 = array_diff($pmName, $regiName);
        // PmsModelからresult2の分だけ引っ張ってくる
        $q = Pms::where(function($query) use ($result2, $user_name){
          $i = 0;
          foreach($result2 as $res){
            $where = (!$i) ? 'where' : 'orWhere';
            $i++;
            $query->$where('property_name', '=', $res)->where('person', '=', $user_name);
          }
        });
        $newCsvDatas = $q->distinct()->select('property_name')->get();

      // 登録済みデータを元にHTML化
      $html_regi = $html_instance->FeeHtml($registerdList, $userList, $count19);

      // 19と登録済みの合計個数
      $regiCount = ( isset($registerdList) ) ? count($registerdList) : 0 ;
      $countRegi = $count19 + $regiCount;
      // 増えた分を元にHTML化
      $html_NoRegi = $html_instance->noFeeHtml($newCsvDatas, $userList, $countRegi);

    }

    // html連結
    $manageHtmlNoBt = $html19 . $html_regi . $html_NoRegi;
    //ボタン部分連結
    $manageHtml = $manageHtmlNoBt . $html_instance->htmlButton();

    // 全データの個数
    $newDataCount = ( isset($newCsvDatas) ) ? count($newCsvDatas) : 0 ;
    $regiCount = ( isset($registerdList) ) ? count($registerdList) : 0 ;
    $dataCount = $count19 + $regiCount + $newDataCount;

    // dd($registerdList);

    return view('commissions.manage', compact('now_year', 'now_month', 'now_day', 'service',  'userList', 'manageHtml', 'dataCount'));
  }


/*
  |--------------------------------------------------------------------------
  | 【管理】入力ページ登録
  |--------------------------------------------------------------------------
*/
  public function postManage(Request $request)
  {

    // SaveMethodに渡してsave
    $dates_instance = new Commission\SaveMethod;
    $dates_instance->commissionDatasManage($request);

    $now_year = session('year');
    $now_month = session('month');
    $now_day = session('day');
    return redirect()->route('commissions.manage', compact('now_year', 'now_month', 'now_day'));
  }


  /*
  |--------------------------------------------------------------------------
  | 【現金受領・紹介料】入力ページトップ
  |--------------------------------------------------------------------------
*/
  public function getOther()
  {
    list($now_year, $now_month, $now_day, $search_month, $date) = $this->showDayTime();
    $user_name = Auth::user()->name;
    $service = $this->service;
    $dates_instance = new Commission\GetDatas;
    $csvDatas = $dates_instance->csvDatasBankZero($now_year, $now_month, $user_name);
    $userList = $dates_instance->userList();
    //登録済みデータ
    $registerdList = $dates_instance->relayMethod($user_name, $date, '賃貸');

    return view('commissions.other', compact('now_year', 'now_month', 'now_day', 'service', 'csvDatas', 'userList', 'registerdList'));
  }

/*
|--------------------------------------------------------------------------
| 【現金受領・紹介料】入力ページ登録
|--------------------------------------------------------------------------
*/
  public function postOther(Request $request)
  {

    // SaveMethodに渡してsave
    $dates_instance = new Commission\SaveMethod;
    $dates_instance->commissionDatasZero($request);

    $now_year = session('year');
    $now_month = session('month');
    $now_day = session('day');
    return redirect()->route('commissions.other');
  }



}
