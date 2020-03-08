<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pms extends Model
{
    protected  $fillable = [
        'owners_id',
        'property_name',
        'room_number',
        'property_group',
        'status',
        'owner_name',
        'pm_fee',
        'cycle',
        'transfer_date',
        'start_date',
        'end_date',
        'tenant_name',
        'rent',
        'cs_fee',
        'deposit',
        'person',
        'transfer_name',
    ];

    function check(){
        return $this->hasMany('App\PmCheck');
    }

    function owners(){
        return $this->belongsTo('App\Owners');
    }
}
