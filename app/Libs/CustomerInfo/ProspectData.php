<?php

namespace App\Libs\CustomerInfo;

use Auth;
use App\CustomerInformation;
use App\Sales;

class ProspectData{

/*
  |--------------------------------------------------------------------------
  | 【申込み状況】用Method
  |--------------------------------------------------------------------------
*/
  public function salesGet($salesList){
    //申込全体
    $bf_array = [];
    $ad_array = [];
    $bf_dis_array = [];
    $ad_dis_array = [];
    for($i = 0; $i < count($salesList); $i++){
      $bf_array[] = $salesList[$i]->sales->brokerage_fee;
      $ad_array[] = $salesList[$i]->sales->advertising_fee;
      $bf_dis_array[] = $salesList[$i]->sales->discount;
      $ad_dis_array[] = $salesList[$i]->sales->adOffset;
    }
    //申込み全体
    $bf_sum = array_sum($bf_array);
    $ad_sum = array_sum($ad_array);
    $bf_dis_sum = array_sum($bf_dis_array);
    $ad_dis_sum = array_sum($ad_dis_array);
    $prospect_sum = $bf_sum + $ad_sum - $bf_dis_sum - $ad_dis_sum;
    return array($bf_sum, $ad_sum, $bf_dis_sum, $ad_dis_sum, $prospect_sum);
  }

  public function otherMonthGet($salesList, $year, $month){
    $bf_array = [];
    $ad_array = [];
    $bf_dis_array = [];
    $ad_dis_array = [];
    for($i = 0; $i < count($salesList); $i++){
      //仲手着金予定
      if($salesList[$i]->sales->bf_payment_schedule == $year . '-' . $month . '-01'){
        $bf_array[] = $salesList[$i]->sales->brokerage_fee;
        $bf_dis_array[] =  $salesList[$i]->sales->discount;
      }
        //AD着金予定
      if($salesList[$i]->sales->ad_payment_schedule == $year . '-' . $month . '-01'){
        $ad_array[] = $salesList[$i]->sales->advertising_fee;
        $ad_dis_array[] = $salesList[$i]->sales->adOffset;
      }
    }
    $bf_sum = array_sum($bf_array);
    $ad_sum = array_sum($ad_array);
    $bf_dis_sum = array_sum($bf_dis_array);
    $ad_dis_sum = array_sum($ad_dis_array);
    $prospect_sum = $bf_sum + $ad_sum - $bf_dis_sum - $ad_dis_sum;
    return array($bf_sum, $ad_sum, $bf_dis_sum, $ad_dis_sum, $prospect_sum);
  }

  public function applyGet($year, $month){
    $userID = Auth::user()->id;
    $salesList = CustomerInformation::with('sales')->where('user_id', '=', $userID)->where('status', '=', '申込')->get();
    $nextYear = 0;
    $nextMonth = 0;
    if($month == 12){
      $nextYear = $year + 1;
      $nextMonth = 1;
    }else{
      $nextYear = $year;
      $nextMonth = $month + 1;
    }

    //申込み全体
    list($b_fee_sum, $ad_fee_sum, $b_discount_sum, $ad_discount_sum, $prospect_sum) = $this->salesGet($salesList);

    //当月着金予定
    list($b_fee_sum_thisMonth, $ad_fee_sum_thisMonth, $b_discount_sum_thisMonth, $ad_discount_sum_thisMonth, $prospect_sum_thisMonth) = $this->otherMonthGet($salesList, $year, $month);

    //翌月着金予定
    list($b_fee_sum_nextMonth, $ad_fee_sum_nextMonth, $b_discount_sum_nextMonth, $ad_discount_sum_nextMonth, $prospect_sum_nextMonth) = $this->otherMonthGet($salesList, $nextYear, $nextMonth);

    $contexts = array(
    'b_fee_sum' => $b_fee_sum,
    'ad_fee_sum' => $ad_fee_sum,
    'b_discount_sum' => $b_discount_sum,
    'ad_discount_sum' => $ad_discount_sum,
    'prospect_sum' => $prospect_sum,
    'b_fee_sum_thisMonth' => $b_fee_sum_thisMonth,
    'ad_fee_sum_thisMonth' => $ad_fee_sum_thisMonth,
    'b_discount_sum_thisMonth' => $b_discount_sum_thisMonth,
    'ad_discount_sum_thisMonth' => $ad_discount_sum_thisMonth,
    'prospect_sum_thisMonth' => $prospect_sum_thisMonth,
    'b_fee_sum_nextMonth' => $b_fee_sum_nextMonth,
    'ad_fee_sum_nextMonth' => $ad_fee_sum_nextMonth,
    'b_discount_sum_nextMonth' => $b_discount_sum_nextMonth,
    'ad_discount_sum_nextMonth' => $ad_discount_sum_nextMonth,
    'prospect_sum_nextMonth' =>$prospect_sum_nextMonth
    );

    return $contexts;

  }


/*
  |--------------------------------------------------------------------------
  | 【【確度別】見込み売上】用Method
  |--------------------------------------------------------------------------
*/
  public function sumCount($salesList, $accuracy){
    $array = [];

    for($i = 0; $i < count($salesList); $i++){
      if($salesList[$i]->accuracy == $accuracy){
        $array[] = $salesList[$i]->sales->brokerage_fee;
      }
    }
    $array_sum = array_sum($array);
    $array_count = count($array);
    return [$array_sum, $array_count];
  }


  public function accuracyGet(){
    $userID = Auth::user()->id;
    $salesList = CustomerInformation::with('sales')->where('user_id', '=', $userID)->where('status', '=', '---')->get();
    $A = 'A';
    $B = 'B';
    $C = 'C';
    $D = 'D';

    list($A_sum, $A_count) = $this->sumCount($salesList, $A);
    list($B_sum, $B_count) = $this->sumCount($salesList, $B);
    list($C_sum, $C_count) = $this->sumCount($salesList, $C);
    list($D_sum, $D_count) = $this->sumCount($salesList, $D);
    $sumSum = $A_sum + $B_sum + $C_sum + $D_sum;
    $sumCount = $A_count + $B_count + $C_count + $D_count;

    $contexts = array(
      'A_sum' => $A_sum,
      'A_count' => $A_count,
      'B_sum' => $B_sum,
      'B_count' => $B_count,
      'C_sum' => $C_sum,
      'C_count' => $C_count,
      'D_sum' => $D_sum,
      'D_count' => $D_count,
      'sumSum' => $sumSum,
      'sumCount' => $sumCount
    );
    return $contexts;
  }


/*
  |--------------------------------------------------------------------------
  | 【見込み客】用Method
  |--------------------------------------------------------------------------
*/
  public function prospectGet($year, $month){
    $userID = Auth::user()->id;
    $saleseList = CustomerInformation::with('sales')->where('user_id', '=', $userID)->where('apply', '=', $year . '-' . $month . '-01')->where('status', '=', '---')->get();
    return $saleseList;
  }


/*
  |--------------------------------------------------------------------------
  | 【申込中】用Method
  |--------------------------------------------------------------------------
*/
  public function applyPeplesGet(){
    $userID = Auth::user()->id;
    $saleseList = CustomerInformation::with('sales')->where('user_id', '=', $userID)->where('status', '=', '申込')->get();
    return $saleseList;
  }


/*
  |--------------------------------------------------------------------------
  | 【当月着金予定】用Method
  |--------------------------------------------------------------------------
*/
  public function thisMonthGet($year, $month){
    $userID = Auth::user()->id;
    $saleseList = CustomerInformation::with('sales')->where('user_id', '=', $userID)->where('status', '=', '申込')->orWhere('status', '=', '審査通過')->orWhere('status', '=', '契約締結')->orWhere('status', '=', '完了')->get();
 // dd($salesListArray);
    return $saleseList;
  }


/*
  |--------------------------------------------------------------------------
  | 【当月着金予定】and【翌月着金予定】用Method
  |--------------------------------------------------------------------------
*/
  public function nextMonthGet($year, $month){
    $userID = Auth::user()->id;
    if($month == 12){
    $newYear = $year + 1;
    $newMonth = 1;
    }else{
    $newYear = $year;
    $newMonth = $month + 1;
    }
    $salesListArray = [];
    $saleseList = CustomerInformation::with('sales')->where('user_id', '=', $userID)->where('status', '=', '申込')->orWhere('status', '=', '審査通過')->orWhere('status', '=', '契約締結')->orWhere('status', '=', '完了')->get();

    for($i = 0; $i < count($saleseList); $i++){
      if($saleseList[$i]->sales->bf_payment_schedule == $newYear . '-' . $newMonth . '-01'){
        $salesListArray[] = $saleseList[$i];
      }
      if($saleseList[$i]->sales->ad_payment_schedule == $newYear . '-' . $newMonth . '-01'){
        $salesListArray[] = $saleseList[$i];
      }
    }
    // dd($salesListArray);

    return $salesListArray;
  }

}
