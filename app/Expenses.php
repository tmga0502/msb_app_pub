<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    //
    protected $fillable = [
        'user_id', 'date', 'party', 'times', 'c_cost', 'atbb', 'atbb_customer', 'regular', 'other1', 'other1_remart', 'other2', 'other2_remark', 'other3', 'other3_remark'
    ];
}
