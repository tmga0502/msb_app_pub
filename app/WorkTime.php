<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    //
    protected $fillable = [
    	'user_id',
    	'date',
    	'start',
    	'end',
    	'break'
    ];
}
