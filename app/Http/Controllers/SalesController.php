<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\CustomerInformation;
use \App\Sales;

class SalesController extends Controller
{
/*
  |--------------------------------------------------------------------------
  | 顧客新規登録->売上更新
  |--------------------------------------------------------------------------
*/
    public function salesUpdate(Request $request){
        $id = $request->id;
        $bro_fee = ($request->brokerage_fee == '') ? 0 : $request->brokerage_fee;
        $bps = ($request->bf_payment_schedule == '') ? null : $request->bf_payment_schedule . '-01';
        $ad_fee = ($request->advertising_fee == '') ? 0 : $request->advertising_fee;
        $aps = ($request->ad_payment_schedule == '') ? null : $request->ad_payment_schedule . '-01';
        $discount = ($request->discount == '') ? 0 : $request->discount;
        $bf_amount = ($request->bf_payment_amount == '') ? 0 : $request->bf_payment_amount;
        $bf_p = ($request->bf_payment == '') ? null : $request->bf_payment;
        $ad_amount = ($request->ad_payment_amount == '') ? 0 : $request->ad_payment_amount;
        $ad_p = ($request->ad_payment == '') ? null : $request->ad_payment;
        $adOffset = ($request->adOffset == '') ? 0 : $request->adOffset;

        $customerList = CustomerInformation::find($id)->sales();
        $salesList = Sales::where('customer_information_id', '=', $id)->first();

        if(isset($salesList)){
            $customerList->update([
            'brokerage_fee' => $bro_fee,
            'bf_payment_schedule' => $bps,
            'advertising_fee' => $ad_fee,
            'ad_payment_schedule' => $aps,
            'discount' => $discount,
            'bf_payment_check' => $request->bf_payment_check,
            'bf_payment_amount' => $bf_amount,
            'bf_payment' => $bf_p,
            'ad_payment_check' => $request->ad_payment_check,
            'ad_payment_amount' => $ad_amount,
            'ad_payment' => $ad_p,
            'adOffset' => $adOffset
            ]);
        }else{
            $customerList->create([
            'customer_information_id' => $id,
            'brokerage_fee' => $bro_fee,
            'bf_payment_schedule' => $bps,
            'advertising_fee' => $ad_fee,
            'ad_payment_schedule' => $aps,
            'discount' => $discount,
            'bf_payment_check' => $request->bf_payment_check,
            'bf_payment_amount' => $bf_amount,
            'bf_payment' => $bf_p,
            'ad_payment_check' => $request->ad_payment_check,
            'ad_payment_amount' => $ad_amount,
            'ad_payment' => $ad_p,
            'adOffset' => $adOffset
            ]);
        }

        return redirect()->route('c_data.c_detail', compact('id')) ;

    }
}
