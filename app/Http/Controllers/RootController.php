<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Csv;
use App\Expenses;
use App\Payrolls;
use App\Commissions;
use App\Libs\Root;
use App\Libs\Commission;

class RootController extends Controller
{
private $nominalForRoot17 = ['---', '仲介手数料', '広告料', '契約金等', '管理報酬', '業務委託料', '紹介料', '預かり手付金', '社債返還', '社債利息', '受取利息', 'その他', '諸口'];

private $nominalForRoot19 = ['---', 'a', 'b', 'c', 'd', 'e'];

/*
  |--------------------------------------------------------------------------
  | Topページ表示
  |--------------------------------------------------------------------------
*/
  public function getTop(){
    $dt = Carbon::now();
    $now_year = $dt->year;
    $now_month = $dt->month;
    $now_day = $dt->day;
    return view('root.top',compact('now_year', 'now_month', 'now_day'));
  }

  public function getTopPage(){
    return view('root.topPage');
  }

/*
  |--------------------------------------------------------------------------
  | CSV登録・一覧ページ表示
  |--------------------------------------------------------------------------
*/
  public function csvTop(){
    $dt = Carbon::now();
    if($dt->month == 1){
      $now_year = $dt->year - 1;
      $now_month = 12;
    }else{
      $now_year = $dt->year;
      $now_month = $dt->month - 1;
    }
    $now_day = $dt->day;
    $nominalForRoot17 = $this->nominalForRoot17;
    $nominalForRoot19 = $this->nominalForRoot19;
    $datas0 = Csv::where('bank_number', '=', 0)->where('year', '=', $now_year)->where('month', '=', $now_month)->get();
    $datas17 = Csv::where('bank_number', '=', 17)->where('year', '=', $now_year)->where('month', '=', $now_month)->get();
    $datas19 = Csv::where('bank_number', '=', 19)->where('year', '=', $now_year)->where('month', '=', $now_month)->get();
    $lists = Csv::groupBy('bank_number', 'year','month')->paginate(6, ['bank_number', 'year', 'month']);
    $userList = ['---'];
    $users = User::select('name')->get();
    foreach($users as $user){
      $userList[] = $user->name;
    }

    return view('root.csv',compact('now_year', 'now_month', 'now_day', 'datas0', 'datas17', 'datas19', 'lists', 'nominalForRoot17', 'nominalForRoot19', 'userList'));  
  }



  

/****** 以下旧データ。新データ完成後削除すること **********/

/*
  |--------------------------------------------------------------------------
  | 振り込み額一覧表示
  |--------------------------------------------------------------------------
*/
    public function getTransferList(){
        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $search_month = $now_month - 1;
        $now_day = $dt->day;
        if ($now_month == 1) {
          $date = $now_year - 1 . '-12';
        } else {
          $date = $now_year . '-' . $now_month;
        }
        //ユーザー情報から、名前、銀行名、支店名、普or当、口座番号取得
        $users = User::whereNotIn('superUser', [1])->select(['id', 'name', 'bank', 'bank_branch', 'bank_type', 'bank_number'])->get();
        // dd($user);

        //①ユーザーidを別クラスに渡して、売上の合計額計算させる
        $dates_instance = new Commission\GetDatas;
        $userList = $dates_instance->userList();
        $userIDList = $dates_instance->userIDList();
        $totalSum = $dates_instance->allTotal($date, $userList);
        $expense = $dates_instance->expense($now_year, $now_month, $userIDList);
        $rewardArray = [];
        if (isset($totalSum[7][0])) {
          for ($i = 0; $i < count($expense[9]); $i++) {
            $rewardArray[] = intval($totalSum[7][$i]) - $expense[9][$i];
          }
        }
        //②源泉額クラスに売上合計渡して、源泉計算させる
        if (isset($totalSum[7][0])) {
          $tax = $dates_instance->tax($now_year, $now_month, $userIDList, $rewardArray);
        } else {
          $tax = [];
        }

        //③売上合計-源泉
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
        // dd($btArray);

        // 合計の計算
        $taxSum = array_sum($tax);
        $btSum = array_sum($btArray);



        //①〜③をreturn
        return view('root.transferList',compact('now_year', 'now_month', 'now_day', 'users', 'tax', 'btArray', 'taxSum', 'btSum'));
    }

/*
  |--------------------------------------------------------------------------
  | CSV登録・一覧表示
  |--------------------------------------------------------------------------
*/
    public function getCsv(){
        $dt = Carbon::now();
        if($dt->month == 1){
          $now_year = $dt->year - 1;
          $now_month = 12;
        }else{
          $now_year = $dt->year;
          $now_month = $dt->month - 1;
        }
        $now_day = $dt->day;
        $nominalForRoot17 = $this->nominalForRoot17;
        $nominalForRoot19 = $this->nominalForRoot19;
        $datas0 = Csv::where('bank_number', '=', 0)->where('year', '=', $now_year)->where('month', '=', $now_month)->get();
        $datas17 = Csv::where('bank_number', '=', 17)->where('year', '=', $now_year)->where('month', '=', $now_month)->get();
        $datas19 = Csv::where('bank_number', '=', 19)->where('year', '=', $now_year)->where('month', '=', $now_month)->get();
        $lists = Csv::groupBy('bank_number', 'year','month')->paginate(6, ['bank_number', 'year', 'month']);
        $userList = ['---'];
        $users = User::select('name')->get();
        foreach($users as $user){
          $userList[] = $user->name;
        }
        // dd($datas17);

        return view('root.csv',compact('now_year', 'now_month', 'now_day', 'datas0', 'datas17', 'datas19', 'lists', 'nominalForRoot17', 'nominalForRoot19', 'userList'));
    }


/*
  |--------------------------------------------------------------------------
  | CSVデータ過去分表示
  |--------------------------------------------------------------------------
*/
public function bacNumberCsv($bank_number, $year, $month){
    $datas = Csv::where('bank_number', '=', $bank_number)->where('year', '=', $year)->where('month', '=', $month)->get();
    // dd($datas);
    return view('root.backNumber',compact('year', 'month','datas'));
}

 /*
  |--------------------------------------------------------------------------
  | CSV情報　更新
  |--------------------------------------------------------------------------
*/
  public function postCSV(Request $request)
  {
    $year = $request->year;
    $month = $request->month;
    $day = $request->day;
    $user_name = Auth::user()->name;
    $csv_count = Csv::where('year', '=', $year)->where('month', '=', $month)->count();
    $first = Csv::where('year', '=', $year)->where('month', '=', $month)->first(['id']);
    $first_id = $first->id;
    for ($i = $first_id; $i < $first_id + $csv_count; $i++) {
      $id = $request->id[$i];
      $nominal = $request->nominal[$i];
      $person = $request->person[$i];
      $remark = ($request->remark[$i] == "") ? "" : $request->remark[$i];
      $csv_array = [
        'id' => $id,
        'nominal' => $nominal,
        'person' => $person,
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
      if ($nominal == '契約均等') {
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
        'o_fee_date' => $out_date
      ];
      Commissions::where('csv_id', '=', $id)->first()->fill($com_update)->save();

    }

    $dt = Carbon::now();
    $now_year = $dt->year;
    $now_month = $dt->month;
    $now_day = $dt->day;
    return redirect()->route('root.csv', compact('now_year', 'now_month', 'now_day'));
  }



/*
  |--------------------------------------------------------------------------
  | 経費一覧画面表示
  |--------------------------------------------------------------------------
*/
    public function geteListEpense(){
        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        if($now_month == 1){
          $now_year = $now_year - 1;
          $now_month = 12;
        }
        $month = $now_month - 1;
        $date = $now_year . '-' . $month . '-30';
        //ユーザー情報から、名前
        $users = User::whereNotIn('superUser', [1])->select(['id', 'name'])->get();

        //経費一覧作成classのインスタンス化
        $getSumArray = new Root\GetSumArray;

        //立替経費合計
        $costArray = $getSumArray->costArray($now_year);
        $costSumArray = $getSumArray->costSumArray($now_year);
        //飲み会経費取得
        $partyArray = $getSumArray->usersArray($now_year, 'party');
        $partySumArray = $getSumArray->sumArray($now_year, 'party');
        //Times経費取得
        $timesArray = $getSumArray->usersArray($now_year, 'times');
        $timesSumArray = $getSumArray->sumArray($now_year, 'times');
        //通信費経費取得
        $c_costArray = $getSumArray->usersArray($now_year, 'c_cost');
        $c_costSumArray = $getSumArray->sumArray($now_year, 'c_cost');
        //ATBB取得
        $atbbArray = $getSumArray->atbb($now_year, 'atbb', 'atbb_customer');
        $atbbSumArray = $getSumArray->atbbSum($now_year, 'atbb', 'atbb_customer');
        //定期控除取得
        $regularArray = $getSumArray->usersArray($now_year, 'regular');
        $regularSumArray = $getSumArray->sumArray($now_year, 'regular');
        //その他取得
        $others = ['other1', 'other1_remark','other2', 'other2_remark','other3', 'other3_remark'];
        $othersArray = $getSumArray->oters($now_year, $others);
        // dd($othersArray);
        $othersSumArray = $getSumArray->othersSum($now_year, $others);

        return view('root.expenseList',compact('now_year', 'now_month', 'now_day', 'users', 'costArray', 'costSumArray', 'partyArray', 'partySumArray', 'timesArray', 'timesSumArray', 'c_costArray', 'c_costSumArray', 'atbbArray', 'atbbSumArray', 'regularArray', 'regularSumArray', 'othersArray', 'othersSumArray'));
    }




/*
  |--------------------------------------------------------------------------
  | 経費登録画面表示
  |--------------------------------------------------------------------------
*/
    public function geteCreateEpense($now_year, $now_month, $now_day){
      $month = $now_month - 1;
      $date = $now_year . '-' . $month . '-28';
      $datas = [];
        //ユーザー情報から、名前
        $users = User::whereNotIn('superUser', [1])->select(['id', 'name'])->get();
        foreach($users as $user){
          $expenses = Expenses::where('date', '=', $date)->where('user_id', '=', $user->id)->first();
          $datas[] = $expenses;
        }
        return view('root.expenseCreate',compact('now_year', 'now_month', 'now_day','users', 'datas'));
    }

    public function postSearchExpense_create(Request $request){
      if(isset($request->search)){
        $year = substr($request->date, 0, 4);
        $month = intval(substr($request->date, 5)) + 1;
        $day = '30';
      }else{
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
      }
      return redirect()->route('root.expense_create',compact('year', 'month', 'day'));
    }

/*
  |--------------------------------------------------------------------------
  | 経費登録
  |--------------------------------------------------------------------------
*/
    public function postCreateEpense(Request $request){
      $users = User::whereNotIn('superUser', [1])->select(['id', 'name'])->get();
      $year = $request->year;
      $month = $request->month;
      $count_users = User::All()->count();//管理者用ユーザは除外
      $date = $year . '-' . $month . '-28';
      $array = [];
      $user_id_array = [];
      for($i = 0; $i < $count_users; $i++){
        $user_id = $request->user_id[$i];
        $party = ($request->party[$i] == '') ? null : $request->party[$i];
        $times = ($request->times[$i] == '') ? null : $request->times[$i];
        $c_cost = ($request->c_cost[$i] == '') ? null : $request->c_cost[$i];
        $atbb = ($request->atbb[$i] == '') ? null : $request->atbb[$i];
        $atbb_customer = ($request->atbb_customer[$i] == '') ? null : $request->atbb_customer[$i];
        $regular = ($request->regular[$i] == '') ? null : $request->regular[$i];
        $other1 = ($request->other1[$i] == '') ? null : $request->other1[$i];
        $other1_remark = $request->other1_remark[$i];
        $other2 = ($request->other2[$i] == '') ? null : $request->other2[$i];
        $other2_remark = $request->other2_remark[$i];
        $other3 = ($request->other3[$i] == '') ? null : $request->other3[$i];
        $other3_remark = $request->other3_remark[$i];

        $expens_array = [
          'user_id' => $user_id,
          'date' => $date,
          'party' => $party,
          'times' => $times,
          'c_cost' => $c_cost,
          'atbb' => $atbb,
          'atbb_customer' => $atbb_customer,
          'regular' => $regular,
          'other1' => $other1,
          'other1_remark' => $other1_remark,
          'other2' => $other2,
          'other2_remark' => $other2_remark,
          'other3' => $other3,
          'other3_remark' => $other3_remark
        ];

        $check = Expenses::where('date', '=', $date)->where('user_id','=', $user_id )->first();
        if(isset($check)){
          // dd('aa');
          $check->fill($expens_array)->save();
        }else{
          // dd('bb');
          Expenses::insert($expens_array);
        }

      }

        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;

        $datas = Expenses::where('date', '=', $date)->get();
        return redirect()->route('root.expense_create',compact('now_year', 'now_month', 'now_day', 'users', 'datas'));
    }



/*
  |--------------------------------------------------------------------------
  | 正規雇用賃金台帳表示
  |--------------------------------------------------------------------------
*/
    public function getWageLedger($now_year, $now_month, $now_day){
      $month = $now_month - 1;
      $date = $now_year . '-' . $month . '-30';
      $detailDatas = [];
      $datas = [];
        //ユーザー情報から、名前
        $users = User::whereNotIn('contract_type', [0])->get();
        foreach( $users as $user ){
          $search = Payrolls::where('user_id', '=', $user->id)->where('payday', '=', $date)->get();
          $detailDatas['name'] = $user->name;
          $detailDatas['contract_type'] = $user->contract_type;
          if(isset($search)){
            $detailDatas['array'] = $search;
          }else{
            $detailDatas['array'] = [];
          }
          $datas[] = $detailDatas;
        }
        // dd($datas[0]);
        return view('root.wageLedgerTest',compact('now_year', 'now_month', 'now_day','users', 'datas'));
    }


/*
  |--------------------------------------------------------------------------
  | ユーザー一覧
  |--------------------------------------------------------------------------
*/

  public function getUserList($now_year, $now_month, $now_day){
    $userList = User::whereNotIn('superUser', [1])->where('leaving', '=', null)->get();

    return view('root.userList',compact('now_year', 'now_month', 'now_day','userList'));

  }

/*
  |--------------------------------------------------------------------------
  | ユーザー詳細
  |--------------------------------------------------------------------------
*/

  public function getUserDetail($id){
    $userDetail = User::find($id);
    $dt = Carbon::now();
    $now_year = $dt->year;
    $now_month = $dt->month;
    $now_day = $dt->day;
    return view('root.userDetail',compact('now_year', 'now_month', 'now_day','userDetail'));
  }

/*
  |--------------------------------------------------------------------------
  | ユーザー更新
  |--------------------------------------------------------------------------
*/

  public function postUserDetail(Request $request){
    //SaveAndUpdateにて保存させる
    $userUpdate = new Libs\SaveAndUpdate;
    $userUpdate->userUpdate($request);

    $dt = Carbon::now();
    $now_year = $dt->year;
    $now_month = $dt->month;
    $now_day = $dt->day;
    return redirect()->route('root.userDetail',['id' => $id]);
  }

}
