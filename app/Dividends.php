<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dividends extends Model
{
    protected $fillable = [
        'com_id',
        'd_name',
        'd_percent',
        'd_price'
    ];
}
