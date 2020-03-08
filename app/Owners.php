<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owners extends Model
{
    protected $fillable = ['pms_id', 'corporate_name', 'owner_name', 'first_code', 'last_code', 'prefecture', 'city', 'address', 'tel', 'phone', 'bank', 'bank_branch', 'bank_type','bank_number', 'pay_name'];

    function pms(){
        return $this->hasMany('App\Pms');
    }
}
