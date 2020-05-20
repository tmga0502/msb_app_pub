<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Customers;
use App\Budgets;
use App\Libs\CustomerInfo;
use App\Libs;
use App\Libs\CustomerData;

class CustomerController extends Controller
{
     //フォーム用配列
    private $display_year = 10; //何年分表示させるか
    private $status = ['---', '申込', '審査通過', '契約締結', '完了', 'その他'];
    private $accuracy = ['A', 'B', 'C', 'D'];
    private $introducer = ['---', '【賃貸】自己案件', '【賃貸】社内紹介', '【売買】自己案件', '【売買】社内紹介'];
    private $introduction_type = ['---', '直依頼　友人', '直依頼　リピート', '直依頼　PP','紹介　友人', '紹介　リピート', '紹介　PP', '社内紹介' ];
    private $tax = 1.1; //税率


/*
  |--------------------------------------------------------------------------
  | データ登録&更新用
  |--------------------------------------------------------------------------
*/
    // null判定
    public function nullJudg($str){
        $result = ($str == '') ? null : $str . '-01';
        return $result;
    }

    //dateNull判定
    public function dateNullJudg($str){
        $result = ($str == '') ? null : $str;
        return $result;
    }

    // 0判定
    public function zeroJudg($str){
        $result = ($str == '') ? 0 : $str;
        return $result;
    }

/*
  |--------------------------------------------------------------------------
  | Topページ表示
  |--------------------------------------------------------------------------
*/
    public function getTop(){
        return view('c_data.top');
    }

/*
  |--------------------------------------------------------------------------
  | プロフィールページ表示
  |--------------------------------------------------------------------------
*/
    public function getProfile(){
        $id = Auth::user()->id;
        $userDetail = User::find($id);
        return view('c_data.profile',compact('userDetail'));
    }

/*
  |--------------------------------------------------------------------------
  | プロフィール更新
  |--------------------------------------------------------------------------
*/

  public function postUserDetail(Request $request){
    //SaveAndUpdateにて保存させる
    $userUpdate = new Libs\SaveAndUpdate;
    $userUpdate->userUpdate($request);
    return redirect()->route('c_data.profile');
  }

/*
  |--------------------------------------------------------------------------
  | 予実管理表作成or更新
  |--------------------------------------------------------------------------
*/

  public function postBudgets(Request $request){
    //SaveAndUpdateにて保存させる
    $budgetsSave = new Libs\SaveAndUpdate;
    $budgetsSave->budgetsSave($request);
    return redirect()->route('c_data.profile');
  }


/*
  |--------------------------------------------------------------------------
  | 顧客一覧ページ表示
  |--------------------------------------------------------------------------
*/

    // 検索条件のセッション登録
    public function cListSearch(Request $req){
        if($req->searchBtn == 'cDataSearch'){
            $cName = $req->cName;
            $req->session()->put(['cDataName' => $cName]);
        }else{
            $req->session()->put(['cDataName' => '', 'cDataStatues' => '']);
        }

        return redirect()->route('c_data.c_list');
    }

    public function getCustomerList(){
        $userID = Auth::user()->id;
        $c_name = (session('cDataName') == '') ? '%%' : '%' . session('cDataName') . '%';
        $customerList = Customers::where('user_id', '=', $userID)->where('c_name', 'like', $c_name)->orderBy('id','desc')->paginate(10);
        return view('c_data.customerList', compact('customerList'));
    }

/*
  |--------------------------------------------------------------------------
  | 新規登録ページ表示
  |--------------------------------------------------------------------------
*/
    public function getCreate(){
        $display_year = $this->display_year;//何年表示させるか
        $accuracy = $this->accuracy;
        $introducer = $this->introducer;
        $introduction_type = $this->introduction_type;
        return view('c_data.createCustomer', compact('display_year', 'accuracy', 'introducer', 'introduction_type'));
    }


/*
  |--------------------------------------------------------------------------
  | 顧客新規登録
  |--------------------------------------------------------------------------
*/
    public function postCreate(Request $request){

        $this->validate($request, [
            'c_name' => 'required'
        ]);
        if($request->i_month != ''){
            $i_month = $request->i_month . '-01';
        }

        if($request->plannedApply != ''){
            $plannedApply = $request->plannedApply . '-01';
        }
        Customers::create([
        'user_id' => $request->user_id,
        'c_name' => $request->c_name,
        'c_kana' => $request->c_kana,
        'i_name' => $request->i_name,
        'i_kana' => $request->i_kana,
        'i_relation' => $request->i_relation,
        'statues' => '---',
        'accuracy' => $request->accuracy,
        'i_type' => $request->i_type,
        'i_who' => $request->i_who,
        'i_month' => $i_month,
        'plannedApply' => $plannedApply
        ]);

        return redirect()->route('c_data.top') ;

    }


/*
  |--------------------------------------------------------------------------
  | 顧客詳細ページ表示
  |--------------------------------------------------------------------------
*/
    public function getCustomerDetail($id){
        $customerList = Customers::where('id', '=', $id)->first();

        $display_year = $this->display_year;//何年表示させるか
        $status = $this->status;//状況
        $accuracy = $this->accuracy;//確度
        $introducer = $this->introducer;//紹介種別
        $introduction_type = $this->introduction_type;//紹介種別
        $tax = $this->tax;//税率
        // dd($detail);
        return view('c_data.customerDetail', compact(
            'customerList',
            'display_year',
            'status',
            'accuracy',
            'introducer',
            'introduction_type',
            'tax'
        ));
    }


/*
  |--------------------------------------------------------------------------
  | 顧客詳細編集ページ表示
  |--------------------------------------------------------------------------
*/
    // 基本情報
    public function getCustomerDetailEditBase($id){
        $cList = Customers::where('id', '=', $id)->first();
        $introducer = $this->introducer;//案件種別
        $introduction_type = $this->introduction_type;//紹介種別
        return view('c_data.edit.base', compact( 'cList','introducer', 'introduction_type' ));
    }

    //進捗・売上情報
    public function getCustomerDetailEditSales($id){
        $cList = Customers::where('id', '=', $id)->first();
        return view('c_data.edit.sales', compact( 'cList' ));
    }

    //物件情報
    public function getCustomerDetailEditProperty($id){
        $cList = Customers::where('id', '=', $id)->first();
        return view('c_data.edit.property', compact( 'cList' ));
    }

/*
  |--------------------------------------------------------------------------
  | 顧客情報更新
  |--------------------------------------------------------------------------
*/
    // 基本情報
    public function c_infoUpdate(Request $request){
        $this->validate($request, [
            'c_name' => 'required'
        ]);
        $id = $request->c_id;
        Customers::find($id)->fill($request->all())->save();

        return redirect()->route('c_data.c_detail', compact('id')) ;
    }

    // 売上情報
    public function salesUpdate(Request $request){
        $id = $request->c_id;
        $plannedApply = $this->nullJudg($request->plannedApply);
        $expectedPayment = $this->nullJudg($request->expectedPayment);
        $bfSche = $this->nullJudg($request->bfSche);
        $bfDate = $this->dateNullJudg($request->bfDate);
        $adSche = $this->nullJudg($request->adSche);
        $adDate = $this->dateNullJudg($request->adDate);
        $osDate = $this->dateNullJudg($request->osDate);

        $plannedSales = $this->zeroJudg($request->plannedSales);
        $planBF = $this->zeroJudg($request->planBF);
        $bf = $this->zeroJudg($request->bf);
        $planAD = $this->zeroJudg($request->planAD);
        $ad = $this->zeroJudg($request->ad);
        $outsource = $this->zeroJudg($request->outsource);
        $disBF = $this->zeroJudg($request->disBF);
        $disAD = $this->zeroJudg($request->disAD);
        $introFee = $this->zeroJudg($request->introFee);
        // dd($planAD);
        $sales =[
            'statues' => $request->statues,
            'accuracy' => $request->accuracy,
            'plannedApply' => $plannedApply,
            'progress' => $request->progress,
            'plannedSales' => $plannedSales,
            'expectedPayment' => $expectedPayment,
            'planBF' => $planBF,
            'bfSche' => $bfSche,
            'bf' => $bf,
            'bfDate' => $bfDate,
            'planAD' => $planAD,
            'adSche' => $adSche,
            'ad' => $ad,
            'adDate' => $adDate,
            'outsource' => $outsource,
            'osDate' => $osDate,
            'disBF' => $disBF,
            'disAD' => $disAD,
            'introFee' => $introFee,
        ];
        Customers::find($id)->fill($sales)->save();

        return redirect()->route('c_data.c_detail', compact('id')) ;
    }

    // 物件情報
    public function propertyInformationUpdate(Request $request){
        $id = $request->c_id;
        $contractDate = ($request->contractDate == '') ? null : $request->contractDate;
        $startDate = ($request->startDate == '') ? null : $request->startDate;
        $endDate = ($request->endDate == '') ? null : $request->endDate;
        $pi =[
            'useType' => $request->useType,
            'zipcode' => $request->zipcode,
            'address' => $request->address,
            'mansion_name' => $request->mansion_name,
            'rent' => $request->rent,
            'contractDate' => $contractDate,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'period' => $request->period,
            'notice' => $request->notice,
            'renewalType' => $request->renewalType,
            'renewalFee' => $request->renewalFee,
            'distinationName' => $request->distinationName,
            'd_zipcode' => $request->d_zipcode,
            'd_address' => $request->d_address,
            'd_mansion_name' => $request->d_mansion_name,
            'mcName' => $request->mcName,
            'mcPerson' => $request->mcPerson,
            'mcTel' => $request->mcTel,
            'mcFax' => $request->mcFax,
            'acting' => $request->acting,
            'actingPerson' => $request->actingPerson,
            'actingKana' => $request->actingKana,
            'loan' => $request->loan
        ];
        Customers::find($id)->fill($pi)->save();

        return redirect()->route('c_data.c_detail', compact('id')) ;
    }


/*
  |--------------------------------------------------------------------------
  | 見込み管理表示
  |--------------------------------------------------------------------------
*/
    // 検索条件のセッション登録
    public function prospectDisp(Request $req){
        if($req->btn == 1){
            $year = intval(date('Y',  strtotime($req->search)));
            $month = intval(date('m',  strtotime($req->search)));
            $req->session()->put('year', $year);
            $req->session()->put('month', $month);
        }else{
            $dt = Carbon::now();
            $year = $dt->year;
            $month = $dt->month;
            $req->session()->put('year', $year);
            $req->session()->put('month', $month);
        }

        return redirect()->route('c_data.prospect');
    }

    //表示
     public function getProspect(){
         $year = session('year');
         $month = session('month');
         if($month < 10){
             $month = '0' . $month;
         }
         if($month == 12){
          $newYear = $year + 1;
          $newMonth = '01';
          }else{
          $newYear = $year;
          $newMonth = $month + 1;
        }
        if($newMonth < 10){
        $newMonth = '0' . $newMonth;
        }
        // dd($year);
        $getPrspect_instance = new CustomerInfo\ProspectData;

        //【申込状況】取得
        $applications = $getPrspect_instance->applyGet($year, $month);

        //【確度別】見込み売上】取得
        $accuracies = $getPrspect_instance->accuracyGet();

        //【見込客】取得
        $prospects = $getPrspect_instance->prospectGet($year, $month);

        //【申込中】取得
        $applies = $getPrspect_instance->applyPeplesGet();

        //【当月着金予定】取得
        $thisMonth = $getPrspect_instance->thisMonthGet($year, $month);

        //【翌月着金予定】取得
        $nextMonth = $getPrspect_instance->nextMonthGet($year, $month);
// dd($nextMonth);

         return view('c_data.prospect',compact(
             'year',
             'month',
             'newYear',
             'newMonth',
             'applications',
             'accuracies',
             'prospects',
             'applies',
             'thisMonth',
             'nextMonth'
            ));

     }

/*
  |--------------------------------------------------------------------------
  | 紹介管理ページ表示
  |--------------------------------------------------------------------------
*/
     public function getIntroduction(){
        $userID = Auth::user()->id;
        $iList = Customers::where('user_id', '=', $userID)->groupBy('i_name')->get(['i_name']);
        $resultArray = [];
        for($i =0; $i < count($iList); $i++){
            $iCount = Customers::where('user_id', '=', $userID)->where('i_name', '=', $iList[$i]->i_name)->count();
            $resultArray[] = array('i_name' => $iList[$i]->i_name, 'i_count' => $iCount);
        }
        // dd($resultArray[0]);
        return view('c_data.introduction', compact('iList', 'resultArray'));
     }


/*
  |--------------------------------------------------------------------------
  | 予実管理ページ表示
  |--------------------------------------------------------------------------
*/
    public function getBudget(){
        $user_id = Auth::user()->id;
        //今期計算
        if( 10 <= $month){
            $thisPiriod = $year - 2009;
        }else{
            $$thisPiriod = $year - 2010;
        }
        $q = Budgets::where('user_id', '=', $user_id)->where('period', '=', $thisPiriod)->first();
        if( $q == null){
            $budgetList = null;
        }else{
            $budgetList = $q->ToArray();
            $rsSum = new CustomerData\BudgetSum;
            list($RyearsSum, $SyearSum, $RcontentsSum, $ScontentsSum) = $rsSum->rsSum($budgetList);

        }
        // 実績リスト
        // $performance = CustomerInformation::
        $pList = new CustomerData\PerformanceList;
        $pList->pList(10, $year, $month);
        // dd($budgetList);
        return view('c_data.budget_control',compact('budgetList', 'RyearsSum', 'SyearSum', 'RcontentsSum', 'ScontentsSum'));
    }




}
