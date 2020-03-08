<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
/*
  |--------------------------------------------------------------------------
  | 【売上情報】
  |  'customer_information_id' → foreignKye
  |  'brokerage_fee' → 仲手
  |  'advertising_fee' → AD
  |  'discount' → 仲手割引
  |  'bf_payment_schedule' → 仲手入金予定
  |  'bf_payment_check' → 仲手入金チェック
  |  'bf_payment_amount' → 仲手入金額
  |  'bf_payment' → 仲手入金年
  |  'ad_payment_schedule' → AD入金予定
  |  'ad_payment_check' → AD入金チェック
  |  'ad_payment_amount' → AD入金額
  |  'ad_payment' → AD入金
  |  'adOffset' → AD相殺
  |--------------------------------------------------------------------------
*/

    protected $fillable = [
        'customer_information_id',
        'brokerage_fee',
        'progress',
        'brokerage_fee',
        'advertising_fee',
        'discount',
        'bf_payment_schedule',
        'bf_payment_check',
        'bf_payment_amount',
        'bf_payment',
        'ad_payment_schedule',
        'ad_payment_check',
        'ad_payment_amount',
        'ad_payment',
        'customer_infomation_id',
        'apartment_name',
        'adOffset'
    ];

    public function sales() {
     return $this->belongsTo('App\CustomerInformation');
    }
}
