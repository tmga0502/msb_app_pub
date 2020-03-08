<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerInformation extends Model
{
/*
  |--------------------------------------------------------------------------
  | 【顧客情報】
  |  'user_id' →　ユーザーID
  |  'status' → 状況
  |  'introduce' → 紹介された日
  |  'apply' → 申込み予定
  |  'accuracy' → 角度
  |  'reading' → ふりがな
  |  'customer_name' → お客様名
  |  'introducer' → 案件種別(自己案件or社内紹介)
  |  'introducer_name' → 紹介者名
  |  'introduction_type' → 紹介種別
  |  'progress' → 進捗
  |  'remarks' → 備考
  |--------------------------------------------------------------------------
*/

    protected $fillable = [
        'user_id',
        'status',
        'introduce',
        'apply',
        'accuracy',
        'reading',
        'customer_name',
        'introducer',
        'introducer_name',
        'introduction_type',
        'brokerage_fee',
        'progress',
        'remarks'
    ];

    function sales(){
        return $this->hasOne('App\Sales');
    }

    function propertyInformation(){
        return $this->hasOne('App\PropertyInformation');
    }

    function flow(){
        return $this->hasOne('App\Flow');
    }

    function detail(){
        return $this->hasOne('App\Detail');
    }

}
