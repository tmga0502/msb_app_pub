<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
/*
  |--------------------------------------------------------------------------
  | 【審査後フロー状況】
  |  'required_documents' → 必要書類
  |  'contract_location' → 契約場所案内
  |  'settlement' → 精算書送付
  |  'life_line' → ライフライン案内
  |  'confirmation' → 契約金入金確認
  |  'guarantor' → 保証人承諾書案内
  |  'hand_ovre_kye' → 鍵渡し場所案内
  |  'contract_procedures' → 契約手続き
  |  'ADs_invoice' → AD請求書送付
  |--------------------------------------------------------------------------
*/

    protected $fillable = [
        'required_documents',
        'contract_location',
        'settlement',
        'life_line',
        'confirmation',
        'guarantor',
        'hand_ovre_kye',
        'contract_procedures',
        'ADs_invoice'
    ];
}
