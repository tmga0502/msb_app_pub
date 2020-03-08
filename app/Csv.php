<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csv extends Model
{
    //
    protected $fillable = ['bank_number', 'charge', 'csv_id', 'year','month','day', 'name', 'price', 'nominal', 'person', 'service', 'remark', 'check'];

    function commissions(){
        return $this->hasOne('App\commissions');
    }
}
