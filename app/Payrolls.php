<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payrolls extends Model
{
    //
    protected $fillable = [
        'user_id',
        'payday',
        'salary',
        'remuneration',
        'bonus',
        'commission',
        'allowance',
        'consignment',
        'rent',
        'transport',
        'HealthInsurance',
        'CareInsurance',
        'WelfarePension',
        'EmploInsurance',
        'incomeTax',
        'residentTax',
        'adjustment',
        'rent10%'
    ];
}
