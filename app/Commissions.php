<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commissions extends Model
{
    protected $fillable = ['user_id',
            'csv_id',
            'customer_name',
            'seller_name',
            'apartment_name',
            'room',
            'company',
            'partner',
            'brokerage_fee',
            'b_fee_date',
            'advertising_fee',
            'ad_date',
            'am_pm_fee',
            'am_pm_fee_date',
            'outsourcing_fee',
            'o_fee_date',
            'outsource',
            'ledger',
            'service',
            'rate',
            'maxRate',
            'percent',
            'dividend',
            'receiver_percent',
            'percent_company',
            'dividend_company'
    ];

    protected $casts = [
        'receiver_percent' => 'array'
    ];

    public function csv() {
     return $this->belongsTo('App\Csv');
    }
}
