<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livings extends Model
{
    protected $fillable = [
        'c_id',
        'l_name',
        'l_kana',
        'l_relation',
        'l_birthday'
    ];
}
