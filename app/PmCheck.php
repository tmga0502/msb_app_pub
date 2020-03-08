<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PmCheck extends Model
{
    protected  $fillable = [
        'pm_id',
        'payday',
        'person_check',
        'remittance_date',
        'clerk_check',
        'transfer_date',
        'remark'
    ];

    public function pms()
    {
        return $this->belongsTo('App\Pms');
    }
}
