<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyInformation extends Model
{
/*
  |--------------------------------------------------------------------------
  | 【物件情報】
  |  'apartment_name' → 物件名
  |  'room_number' → 部屋番号
  |  'first_code' → 郵便番号1
  |  'last_code'→ 郵便番号2
  |  'prefecture' → 住所１(都道府県)
  |  'city' → 市区町村
  |  'address' → 以降の住所
  |  'real_estate_agent' → 管理会社
  |  'tel' → 管理会社tel
  |  'fax' → 管理会社fax
  |  'person_in_charge' → 担当者名
  |  'contract_start' → 賃発
  |  'contract_end' → 解約
  |--------------------------------------------------------------------------
*/

    protected $fillable = [
        'apartment_name',
        'room_number',
        'first_code',
        'last_code',
        'prefecture',
        'city',
        'address',
        'real_estate_agent',
        'tel',
        'fax',
        'person_in_charge',
        'contract_start',
        'contract_end'
    ];
}
