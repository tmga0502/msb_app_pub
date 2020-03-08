<?php

namespace App\Libs;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Csv;
use App\Expenses;
use App\Commissions;
use App\Budgets;

class SaveAndUpdate
{

/*
  |--------------------------------------------------------------------------
  | ユーザープロフィールのupdate
  |--------------------------------------------------------------------------
*/
  public function userUpdate($request){
    $id = $request->id;
    $birthday = $request->birthday == "" ? null :  $request->birthday;
    $hire = $request->hire == "" ? null :  $request->hire;
    $legal_hire = $request->legal_hire == "" ? null :  $request->legal_hire;
    $leaving = $request->leaving == "" ? null :  $request->leaving;
    // DBインサート
    $user_update = [
      'contract_type' => $request->contract_type,
      'bank' => $request->bank,
      'bank_branch' => $request->bank_branch,
      'bank_type' => $request->bank_type,
      'bank_number' => $request->bank_number,
      'tel' => $request->tel,
      'lineID' => $request->lineID,
      'msby_mail' => $request->msby_mail,
      'original_mail' => $request->original_mail,
      'address' => $request->address,
      'resident_card' => $request->resident_card,
      'emergency_name' => $request->emergency_name,
      'relationship' => $request->relationship,
      'emergency' => $request->emergency,
      'emergency_address' => $request->emergency_address,
      'birthday' => $birthday,
      'hire' => $hire,
      'legal_hire' => $legal_hire,
      'employee_number' => $request->employee_number,
      'virus_soft' => $request->virus_soft,
      'licence' => $request->licence,
      'leaving' => $leaving
    ];
    // 保存
    User::find($id)->fill($user_update)->save();
  }

/*
  |--------------------------------------------------------------------------
  | 予実管理表のsave
  |--------------------------------------------------------------------------
*/
//配列を数値化関数
  public function intMethod($array){
    $returnArray = [];
    foreach($array as $key => $value){
      if($value == ""){
        $returnArray[$key] = '0';
      }else{
        $returnArray[$key] = $value;
      }
    }
    return $returnArray;
  }

//メイン
  public function budgetsSave($request){
    $user_id = $request->user_id;
    $period = $request->period;
    //requestの配列を数値化していく
    $R_rent_my = $this->intMethod($request->R_rent_my);
    $R_rent_int = $this->intMethod($request->R_rent_int);
    $R_rent_out = $this->intMethod($request->R_rent_out);
    $R_rent_salesInt = $this->intMethod($request->R_rent_salesInt);
    $R_rent_salesInt_com = $this->intMethod($request->R_rent_salesInt_com);
    $R_trade_my = $this->intMethod($request->R_trade_my);
    $R_trade_int = $this->intMethod($request->R_trade_int);
    $R_trade_out = $this->intMethod($request->R_trade_out);
    $R_trade_salesInt = $this->intMethod($request->R_trade_salesInt);
    $R_trade_salesInt_com = $this->intMethod($request->R_trade_salesInt_com);
    $R_other1 = $this->intMethod($request->R_other1);
    $R_other1_remark = $request->R_other1_remark;
    $R_other2 = $this->intMethod($request->R_other2);
    $R_other2_remark = $request->R_other2_remark;
    $R_other3 = $this->intMethod($request->R_other3);
    $R_other3_remark = $request->R_other3_remark;
    $R_manage = $this->intMethod($request->R_manage);
    $S_rent_my = $this->intMethod($request->S_rent_my);
    $S_rent_int = $this->intMethod($request->S_rent_int);
    $S_rent_out = $this->intMethod($request->S_rent_out);
    $S_rent_salesInt = $this->intMethod($request->S_rent_salesInt);
    $S_rent_salesInt_com = $this->intMethod($request->S_rent_salesInt_com);
    $S_trade_my = $this->intMethod($request->S_trade_my);
    $S_trade_int = $this->intMethod($request->S_trade_int);
    $S_trade_out = $this->intMethod($request->S_trade_out);
    $S_trade_salesInt = $this->intMethod($request->S_trade_salesInt);
    $S_trade_salesInt_com = $this->intMethod($request->S_trade_salesInt_com);
    $S_other1 = $this->intMethod($request->S_other1);
    $S_other1_remark = $request->S_other1_remark;
    $S_other2 = $this->intMethod($request->S_other2);
    $S_other2_remark = $request->S_other2_remark;
    $S_other3 = $this->intMethod($request->S_other3);
    $S_other3_remark = $request->S_other3_remark;
    $S_manage = $this->intMethod($request->S_manage);

// dd($S_other1);
    // DBインサート
    $budgetsData = [
      'user_id'=> $user_id,
      'period' => $period,
      'R_rent_my' => $R_rent_my,
      'R_rent_int' => $R_rent_int,
      'R_rent_out' => $R_rent_out,
      'R_rent_salesInt' => $R_rent_salesInt,
      'R_rent_salesInt_com' => $R_rent_salesInt_com,
      'R_trade_my' => $R_trade_my,
      'R_trade_int' => $R_trade_int,
      'R_trade_out' => $R_trade_out,
      'R_trade_salesInt' => $R_trade_salesInt,
      'R_trade_salesInt_com' => $R_trade_salesInt_com,
      'R_other1' => $R_other1,
      'R_other1_remark' => $R_other1_remark,
      'R_other2' => $R_other2,
      'R_other2_remark' => $R_other2_remark,
      'R_other3' => $R_other3,
      'R_other3_remark' => $R_other3_remark,
      'R_manage' => $R_manage,
      'S_rent_my' => $S_rent_my,
      'S_rent_int' => $S_rent_int,
      'S_rent_out' => $S_rent_out,
      'S_rent_salesInt' => $S_rent_salesInt,
      'S_rent_salesInt_com' => $S_rent_salesInt_com,
      'S_trade_my' => $S_trade_my,
      'S_trade_int' => $S_trade_int,
      'S_trade_out' => $S_trade_out,
      'S_trade_salesInt' => $S_trade_salesInt,
      'S_trade_salesInt_com' => $S_trade_salesInt_com,
      'S_other1' => $S_other1,
      'S_other1_remark' => $S_other1_remark,
      'S_other2' => $S_other2,
      'S_other2_remark' => $S_other2_remark,
      'S_other3' => $S_other3,
      'S_other3_remark' => $S_other3_remark,
      'S_manage' => $S_manage
    ];
    //データが有ればupdate
    $check = Budgets::where('user_id', '=', $user_id)->where('period', '=', $period)->first();
    if(isset($check)){
      // 保存
      Budgets::find($user_id)->fill($budgetsData)->save();
    }else{
      //バルクインサート
      Budgets::create($budgetsData);
    }
  }


}
