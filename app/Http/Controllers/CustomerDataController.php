<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\CustomerInformation;
use App\Budgets;
use App\Libs\CustomerInfo;
use App\Libs;
use App\Libs\CustomerData;

class CustomerDataController extends Controller
{
    //フォーム用配列
    private $display_year = 10; //何年分表示させるか
    private $status = ['---', '申込', '審査通過', '契約締結', '完了', 'その他'];
    private $accuracy = ['A', 'B', 'C', 'D'];
    private $introducer = ['【賃貸】自己案件', '【賃貸】社内紹介', '【売買】自己案件', '【売買】社内紹介'];
    private $introduction_type = ['直依頼　友人', '直依頼　リピート', '直依頼　PP','紹介　友人', '紹介　リピート', '紹介　PP', '社内紹介' ];
    private $tax = 1.1; //税率

/*
  |--------------------------------------------------------------------------
  | Topページ表示
  |--------------------------------------------------------------------------
*/
    public function getTop(){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        return view('c_data.top',compact('year', 'month', 'dt'));
    }


/*
  |--------------------------------------------------------------------------
  | プロフィールページ表示
  |--------------------------------------------------------------------------
*/
    public function getProfile(){
        $id = Auth::user()->id;
        $userDetail = User::find($id);
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        return view('c_data.profile',compact('year', 'month', 'dt', 'userDetail'));
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
    //   dd($request->R_other1);
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
    public function getCustomerList(){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $userID = Auth::user()->id;
        $customerList = CustomerInformation::where('user_id', '=', $userID)->orderBy('id','desc')->paginate(10);
        return view('c_data.customerList', compact('customerList', 'year', 'month', 'dt'));
    }

/*
  |--------------------------------------------------------------------------
  | 新規登録ページ表示
  |--------------------------------------------------------------------------
*/
    public function getCreate(){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $display_year = $this->display_year;//何年表示させるか
        return view('c_data.createCustomer', compact('display_year', 'year', 'month'));
    }


/*
  |--------------------------------------------------------------------------
  | 顧客新規登録
  |--------------------------------------------------------------------------
*/
    public function postCreate(Request $request){

        $this->validate($request, [
            'customer_name' => 'required'
        ]);
        if($request->introduce == ''){
            $introduce = null;
        }else{
            $introduce = $request->introduce . '-01';
        }

        if($request->apply == ''){
            $apply = null;
        }else{
            $apply = $request->apply . '-01';
        }
        \App\CustomerInformation::create([
        'user_id' => $request->user_id,
        'status' => $request->status,
        'introduce' => $introduce,
        'apply' => $apply,
        'accuracy' => $request->accuracy,
        'reading' => $request->reading,
        'customer_name' => $request->customer_name,
        'introducer' => $request->introducer,
        'introducer_name' => $request->introducer_name,
        'introduction_type' => $request->introduction_type,
        'progress' => ''
        ]);

        return redirect()->route('c_data.top') ;

    }


/*
  |--------------------------------------------------------------------------
  | 顧客詳細ページ表示
  |--------------------------------------------------------------------------
*/
    public function getCustomerDetail($id){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $customerList = CustomerInformation::where('id', '=', $id)->first();
        $sales = $customerList->sales;
        $p_info = $customerList->propertyInformation;
        $flow = $customerList->flow;
        $detail = $customerList->detail;

        $display_year = $this->display_year;//何年表示させるか
        $status = $this->status;//状況
        $accuracy = $this->accuracy;//確度
        $introducer = $this->introducer;//紹介種別
        $introduction_type = $this->introduction_type;//紹介種別
        $tax = $this->tax;//税率
        // dd($detail);
        return view('c_data.customerDetail', compact(
            'customerList',
            'sales',
            'p_info',
            'flow',
            'detail',
            'display_year',
            'status',
            'accuracy',
            'introducer',
            'introduction_type',
            'tax',
            'year',
            'month',
            'dt'

        ));
    }


/*
  |--------------------------------------------------------------------------
  | 顧客新規登録->顧客情報更新
  |--------------------------------------------------------------------------
*/
    public function c_infoUpdate(Request $request){

        $this->validate($request, [
            'customer_name' => 'required'
        ]);
        $id = $request->id;

        $introduce = ($request->introduce == '') ? null : $request->introduce . '-01';
        $apply = ($request->apply == '') ? null : $request->apply . '-01';

        \App\CustomerInformation::where('id', '=', $id)->update([
        'customer_name' => $request->customer_name,
        'reading' => $request->reading,
        'status' => $request->status,
        'accuracy' => $request->accuracy,
        'introduce' => $introduce,
        'apply' => $apply,
        'introducer' => $request->introducer,
        'introducer_name' => $request->introducer_name,
        'introduction_type' => $request->introduction_type,
        'progress' => $request->progress,
        'remarks' => $request->remarks,
        ]);

        return redirect()->route('c_data.c_detail', compact('id')) ;

    }


/*
  |--------------------------------------------------------------------------
  | 見込み管理表示
  |--------------------------------------------------------------------------
*/
    //表示
     public function getProspect($year, $month){
         if($month == 12){
          $newYear = $year + 1;
          $newMonth = 1;
          }else{
          $newYear = $year;
          $newMonth = $month + 1;
        }
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

     //検索
     public function postProspect(Request $request){
        $dt = Carbon::now();
        if($request->has('serch')){
            if($request->search == ''){
                $year = $dt->year;
                $month = $dt->month;
            }else{
                $year = substr($request->search, 0, 4);
                if(substr($request->search, 5, 1) == 0){
                    $month = substr($request->search, 6, 2);
                }else{
                    $month = substr($request->search, 5, 2);
                }
            }
        }else{
            $year = $dt->year;
            $month = $dt->month;
        }

         return redirect()->route('c_data.prospect', compact('year', 'month')) ;

     }



/*
  |--------------------------------------------------------------------------
  | 予実管理ページ表示
  |--------------------------------------------------------------------------
*/
    public function getBudget(){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
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
        return view('c_data.budget_control',compact('year', 'month', 'dt','budgetList', 'RyearsSum', 'SyearSum', 'RcontentsSum', 'ScontentsSum'));
    }


}
