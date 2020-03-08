<?php

namespace App\Libs\Commission;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Csv;
use App\Expenses;
use App\Commissions;

class SaveMethod{


/*
  |--------------------------------------------------------------------------
  | 【コミッションデータの登録】用Method
  |--------------------------------------------------------------------------
*/
  public function commissionDatas($request){
    $dataCount = $request->dataCount;
      $userCount = $request->userCount;
      $user_name = $request->user_id;
      $json_array = [];

      for($i = 1; $i < $dataCount + 1; $i++){
        // お客様名
        $customer_name = $request->customer_name[$i];
        if($customer_name === ""){
          continue;
        }
        //売主名
        $seller_name = $request->seller_name[$i];

        $csv_id = $request->csv_id[$i];
        //物件名
        $apartment_name = $request->apartment_name[$i];
        //号室
        $room = ( $request->room[$i] == "" ) ? "" : $request->room[$i];
        //管理会社
        $company = $request->company[$i];
        //提携業者
        $partner = $request->partner[$i];
        //仲手
        $brokerage_fee = $request->brokerage_fee[$i];
        //仲手入金日
        $b_fee_date = ( $request->b_fee_date[$i] == "" ) ? null : $request->b_fee_date[$i];
        //AD
        $advertising_fee = ( $request->advertising_fee[$i] == "" ) ? 0 : $request->advertising_fee[$i];
        //AD入金日
        $ad_date = ( $request->ad_date[$i] == "" ) ? null : $request->ad_date[$i];
        //管理報酬
        $am_pm_fee = ( $request->am_pm_fee[$i] == "" ) ? 0 : $request->am_pm_fee[$i];
        //管理報酬入金日
        $am_pm_fee_date = ( $request->am_pm_fee_date[$i] == "" ) ? null : $request->am_pm_fee_date[$i];
        //業務委託料
        $outsourcing_fee = ( $request->outsourcing_fee[$i] == "" ) ? 0 : $request->outsourcing_fee[$i];
        //業務委託料入金日
        $o_fee_date = ( $request->o_fee_date[$i] == "" ) ? null : $request->o_fee_date[$i];
        //外部紹介料
        $outsource = ( $request->outsource[$i] == "" ) ? 0 : $request->outsource[$i];
        //提供サービス
        $service = $request->service;
        //新旧レート
        $rate = ( $request->rate[$i] == "" ) ? 0 : $request->rate[$i];
        //レート上限
        $maxRate = ( $request->maxRate[$i] == "" ) ? 0 : $request->maxRate[$i];
        //個別レートと売上配分の配列
        for($j = 0; $j < $userCount; $j++){
          $json_user = $request->user[$i][$j];
          $json_rate = ( $request->receiver_percent[$i][$j] == "" ) ? 0 : $request->receiver_percent[$i][$j];
          $json_price = (intval(str_replace(',','',$brokerage_fee)) + intval(str_replace(',','',$advertising_fee)) + intval(str_replace(',','',$outsourcing_fee)) - intval(str_replace(',','',$outsource)) ) * intval($json_rate) /100;
          $json_array[$json_user] = ['rate' => $json_rate, 'price' => $json_price];
        }
        //会社配分とレート
        $percent_company = ( $request->percent_company[$i] == "" ) ? 0 : $request->percent_company[$i];
        $dividend_company = (intval(str_replace(',','',$brokerage_fee)) + intval(str_replace(',','',$advertising_fee))) * intval($percent_company) /100;
        //まるっと配列化
        $commission_array = [
          'user_id' => $user_name,
          'csv_id' => $request->csv_id[$i],
          'customer_name' => $customer_name,
          'seller_name' => $seller_name,
          'apartment_name' => $apartment_name,
          'room' => $room,
          'company' => $company,
          'brokerage_fee' => intval(str_replace(',','',$brokerage_fee)),
          'b_fee_date' => $b_fee_date,
          'advertising_fee' => intval(str_replace(',','',$advertising_fee)),
          'ad_date' => $ad_date,
          'am_pm_fee' => intval(str_replace(',','',$am_pm_fee)),
          'am_pm_fee_date' => $am_pm_fee_date,
          'outsourcing_fee' => intval(str_replace(',','',$outsourcing_fee)),
          'o_fee_date' => $o_fee_date,
          'outsource' =>  intval(str_replace(',','',$outsource)),
          'service' => $service,
          'rate' => $rate,
          'maxRate' => $maxRate,
          'receiver_percent' => $json_array,
          'percent_company' => $percent_company,
          'dividend_company' => $dividend_company
        ];
        // コミッションテーブルのupdate
        if($user_name == Auth::user()->name){
          Commissions::where('csv_id', '=', $csv_id)->first()->update($commission_array);
        }

        $commission_array = [];
        $json_array = [];

      }
  }


/*
  |--------------------------------------------------------------------------
  | 【コミッションデータの登録】用Method(現金受領・紹介料用)
  |--------------------------------------------------------------------------
*/
  public function commissionDatasZero($request){
    $dataCount = $request->dataCount;
      $userCount = $request->userCount;
      $user_name = $request->user_id;
      $json_array = [];

      for($i = 1; $i < $dataCount + 1; $i++){
        // お客様名
        $customer_name = $request->customer_name[$i];
        if($customer_name === ""){
          continue;
        }
        //売主名
        $seller_name = $request->seller_name[$i];

        $csv_id = $request->csv_id[$i];
        //物件名
        $apartment_name = $request->apartment_name[$i];
        //号室
        $room = $request->room[$i];
        //管理会社
        $company = $request->company[$i];
        //提携業者
        $partner = $request->partner[$i];
        //仲手
        $brokerage_fee = $request->brokerage_fee[$i];
        //仲手入金日
        $b_fee_date = ( $request->b_fee_date[$i] == "" ) ? null : $request->b_fee_date[$i];
        //AD
        $advertising_fee = ( $request->advertising_fee[$i] == "" ) ? 0 : $request->advertising_fee[$i];
        //AD入金日
        $ad_date = ( $request->ad_date[$i] == "" ) ? null : $request->ad_date[$i];
        //管理報酬
        $am_pm_fee = ( $request->am_pm_fee[$i] == "" ) ? 0 : $request->am_pm_fee[$i];
        //管理報酬入金日
        $am_pm_fee_date = ( $request->am_pm_fee_date[$i] == "" ) ? null : $request->am_pm_fee_date[$i];
        //業務委託料
        $outsourcing_fee = ( $request->outsourcing_fee[$i] == "" ) ? 0 : $request->outsourcing_fee[$i];
        //業務委託料入金日
        $o_fee_date = ( $request->o_fee_date[$i] == "" ) ? null : $request->o_fee_date[$i];
        //外部紹介料
        $outsource = ( $request->outsource[$i] == "" ) ? 0 : $request->outsource[$i];
        //提供サービス
        $service = $request->service[$i];
        //新旧レート
        $rate = ( $request->rate[$i] == "" ) ? 0 : $request->rate[$i];
        //レート上限
        $maxRate = ( $request->maxRate[$i] == "" ) ? 0 : $request->maxRate[$i];
        //個別レートと売上配分の配列
        for($j = 0; $j < $userCount; $j++){
          $json_user = $request->user[$i][$j];
          $json_rate = ( $request->receiver_percent[$i][$j] == "" ) ? 0 : $request->receiver_percent[$i][$j];
          $json_price = (intval(str_replace(',','',$brokerage_fee)) + intval(str_replace(',','',$advertising_fee)) + intval(str_replace(',','',$outsourcing_fee)) - intval(str_replace(',','',$outsource)) ) * intval($json_rate) /100;
          $json_array[$json_user] = ['rate' => $json_rate, 'price' => $json_price];
        }
        //会社配分とレート
        $percent_company = ( $request->percent_company[$i] == "" ) ? 0 : $request->percent_company[$i];
        $dividend_company = (intval(str_replace(',','',$brokerage_fee)) + intval(str_replace(',','',$advertising_fee))) * intval($percent_company) /100;
        //まるっと配列化
        $commission_array = [
          'user_id' => $user_name,
          'csv_id' => $request->csv_id[$i],
          'customer_name' => $customer_name,
          'seller_name' => $seller_name,
          'apartment_name' => $apartment_name,
          'room' => $room,
          'company' => $company,
          'brokerage_fee' => intval(str_replace(',','',$brokerage_fee)),
          'b_fee_date' => $b_fee_date,
          'advertising_fee' => intval(str_replace(',','',$advertising_fee)),
          'ad_date' => $ad_date,
          'am_pm_fee' => intval(str_replace(',','',$am_pm_fee)),
          'am_pm_fee_date' => $am_pm_fee_date,
          'outsourcing_fee' => intval(str_replace(',','',$outsourcing_fee)),
          'o_fee_date' => $o_fee_date,
          'outsource' =>  intval(str_replace(',','',$outsource)),
          'service' => $service,
          'rate' => $rate,
          'maxRate' => $maxRate,
          'receiver_percent' => $json_array,
          'percent_company' => $percent_company,
          'dividend_company' => $dividend_company
        ];
        // コミッションテーブルのupdate
        if($user_name == Auth::user()->name){
          Commissions::where('csv_id', '=', $csv_id)->first()->update($commission_array);
        }

        $commission_array = [];
        $json_array = [];

      }
  }


/*
  |--------------------------------------------------------------------------
  | 【コミッションデータの登録】用Method(管理物件用)
  |--------------------------------------------------------------------------
*/

public function commissionDatasManage($request){
	$userCount = $request->userCount;
	$user_name = $request->user_id;
	$json_array = [];
   	$dataCount = $request->dataCount;


    for($i = 1; $i < $dataCount + 1; $i++){
		// id
		$id = $request->id[$i];
		// csv_id
		$csv_id = ( $request->csv_id[$i] == "" ) ? null : intval($request->csv_id[$i]);
		// お客様名
		$customer_name = $request->customer_name[$i];
		//物件名
		$apartment_name = $request->apartment_name[$i];
		//提携業者
		$partner = $request->partner[$i];
		//管理報酬
		$am_pm_fee = ( $request->am_pm_fee[$i] == "" ) ? 0 : $request->am_pm_fee[$i];
		//管理報酬入金日
		$am_pm_fee_date = ( $request->am_pm_fee_date[$i] == "" ) ? null : $request->am_pm_fee_date[$i];
		//業務委託料
		$outsourcing_fee = ( $request->outsourcing_fee[$i] == "" ) ? 0 : $request->outsourcing_fee[$i];
		//業務委託料入金日
		$o_fee_date = ( $request->o_fee_date[$i] == "" ) ? null : $request->o_fee_date[$i];
		//外部紹介料
		$outsource = ( $request->outsource[$i] == "" ) ? 0 : $request->outsource[$i];
		//提供サービス
		$service = $request->service[$i];
		//新旧レート
		$rate = ( $request->rate[$i] == "" ) ? 0 : $request->rate[$i];
		//レート上限
		$maxRate = ( $request->maxRate[$i] == "" ) ? 0 : $request->maxRate[$i];
		//個別レートと売上配分の配列
		for($j = 0; $j < $userCount; $j++){
		$json_user = $request->user[$i][$j];
		$json_rate = ( $request->receiver_percent[$i][$j] == "" ) ? 0 : $request->receiver_percent[$i][$j];
		$json_price = (intval(str_replace(',','',$am_pm_fee)) + intval(str_replace(',','',$outsourcing_fee)) - intval(str_replace(',','',$outsource)) ) * intval($json_rate) /100;
		$json_array[$json_user] = ['rate' => $json_rate, 'price' => $json_price];
		}
		//会社配分とレート
		$percent_company = ( $request->percent_company[$i] == "" ) ? 0 : $request->percent_company[$i];
		$dividend_company = (intval(str_replace(',','',$am_pm_fee))) * intval($percent_company) /100;
		//まるっと配列化
		$commission_array = [
		'user_id' => $user_name,
		'csv_id' => $csv_id,
		'customer_name' => $customer_name,
		'apartment_name' => $apartment_name,
		'am_pm_fee' => intval(str_replace(',','',$am_pm_fee)),
		'am_pm_fee_date' => $am_pm_fee_date,
		'outsourcing_fee' => intval(str_replace(',','',$outsourcing_fee)),
		'o_fee_date' => $o_fee_date,
		'outsource' =>  intval(str_replace(',','',$outsource)),
		'service' => $service,
		'rate' => $rate,
		'maxRate' => $maxRate,
		'receiver_percent' => $json_array,
		'percent_company' => $percent_company,
		'dividend_company' => $dividend_company
		];
		// dd($commission_array);
		// コミッションテーブルの登録
		if($user_name == Auth::user()->name){
			if($id == ''){
				Commissions::create($commission_array);
			}else{
				Commissions::where('id', '=', $id)->first()->update($commission_array);
			}
		}

		$commission_array = [];
		$json_array = [];
    	
    }

}








}
