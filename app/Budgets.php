<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budgets extends Model
{
/*
  |--------------------------------------------------------------------------
  | 【個人予算】
  |  'user_id' →　ユーザーID
  |  'period' → ○○期
  |  'R_rent_my' → 必達賃貸自己案件1月〜12月
  |  'R_rent_int' → 必達賃貸紹介案件1月〜12月
  |  'R_rent_out' → 必達賃貸提携業者1月〜12月
  |  'R_rent_salesInt' → 必達賃貸社内紹介売上1月〜12月
  |  'R_rent_salesInt_com' → 必達賃貸社内紹介コミッション1月〜12月
  |  'R_trade_my' → 必達売買自己案件1月〜12月
  |  'R_trade_int' → 必達売買紹介案件1月〜12月
  |  'R_trade_out' → 必達売買提携業者1月〜12月
  |  'R_trade_salesInt' → 必達売買社内紹介売上1月〜12月
  |  'R_trade_salesInt_com' → 必達売買社内紹介コミッション1月〜12月
  |  'R_other1' → 必達その他①1月〜12月
  |  'R_other1_remark' → 必達その他①1月〜12月
  |  'R_other2' → 必達その他②1月〜12月
  |  'R_other2_remark' → 必達その他②1月〜12月
  |  'R_other3' → 必達その他③1月〜12月
  |  'R_other3_remark' → 必達その他③1月〜12月
  |  'R_manage' → 必達管理1月〜12月
  |
  |  'S_rent_my' → ストレッチ賃貸自己案件1月〜12月
  |  'S_rent_int' → ストレッチ賃貸紹介案件1月〜12月
  |  'S_rent_out' → ストレッチ賃貸提携業者1月〜12月
  |  'S_rent_salesInt' → ストレッチ賃貸社内紹介売上1月〜12月
  |  'S_rent_salesInt_com' → ストレッチ賃貸社内紹介コミッション1月〜12月
  |  'S_trade_my' → ストレッチ売買自己案件1月〜12月
  |  'S_trade_int' → ストレッチ売買紹介案件1月〜12月
  |  'S_trade_out' → ストレッチ売買提携業者1月〜12月
  |  'S_trade_salesInt' → ストレッチ売買社内紹介売上1月〜12月
  |  'S_trade_salesInt_com' → ストレッチ売買社内紹介コミッション1月〜12月
  |  'S_other1' → ストレッチ①その他1月〜12月
  |  'S_other1_remark' → ストレッチ①その他1月〜12月
  |  'S_other2' → ストレッチ②その他1月〜12月
  |  'S_other2_remark' → ストレッチ②その他1月〜12月
  |  'S_other3' → ストレッチ③その他1月〜12月
  |  'S_other3_remark' → ストレッチ③その他1月〜12月
  |  'S_manage' → ストレッチ管理1月〜12月
  |--------------------------------------------------------------------------
*/

    protected $fillable = [
    'user_id',
    'period',
    'R_rent_my',
    'R_rent_int',
    'R_rent_out',
    'R_rent_salesInt',
    'R_rent_salesInt_com',
    'R_trade_my',
    'R_trade_int',
    'R_trade_out',
    'R_trade_salesInt',
    'R_trade_salesInt_com',
    'R_other1',
    'R_other1_remark',
    'R_other2',
    'R_other2_remark',
    'R_other3',
    'R_other3_remark',
    'R_manage',
    'S_rent_my',
    'S_rent_int',
    'S_rent_out',
    'S_rent_salesInt',
    'S_rent_salesInt_com',
    'S_trade_my',
    'S_trade_int',
    'S_trade_out',
    'S_trade_salesInt',
    'S_trade_salesInt_com',
    'S_other1',
    'S_other1_remark',
    'S_other2',
    'S_other2_remark',
    'S_other3',
    'S_other3_remark',
    'S_manage'
  ];

  protected $casts = [
    'R_rent_my' => 'array',
    'R_rent_int' => 'array',
    'R_rent_out' => 'array',
    'R_rent_salesInt' => 'array',
    'R_rent_salesInt_com' => 'array',
    'R_trade_my' => 'array',
    'R_trade_int' => 'array',
    'R_trade_out' => 'array',
    'R_trade_salesInt' => 'array',
    'R_trade_salesInt_com' => 'array',
    'R_other1' => 'array',
    'R_other2' => 'array',
    'R_other3' => 'array',
    'R_manage' => 'array',
    'S_rent_my' => 'array',
    'S_rent_int' => 'array',
    'S_rent_out' => 'array',
    'S_rent_salesInt' => 'array',
    'S_rent_salesInt_com' => 'array',
    'S_trade_my' => 'array',
    'S_trade_int' => 'array',
    'S_trade_out' => 'array',
    'S_trade_salesInt' => 'array',
    'S_trade_salesInt_com' => 'array',
    'S_other1' => 'array',
    'S_other2' => 'array',
    'S_other3' => 'array',
    'S_manage' => 'array',
 ];
}
