<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = [
        'user_id', 'space_name', 'purpose', 'description', 'start_time' ,'end_time', 'date'
    ];


    protected $guarded = ['id'];

    // 新規登録Scope
    public function scopeWhereHasReservation($query, $start, $end) {

        $query->where(function($q) use($start, $end) {

            $q->where('start_time', '>=', $start)
                ->where('start_time', '<', $end);

        })
        ->orWhere(function($q) use($start, $end) {

            $q->where('end_time', '>', $start)
                ->where('end_time', '<=', $end);

        })
        ->orWhere(function($q) use ($start, $end) {

            $q->where('start_time', '<', $start)
                ->where('end_time', '>', $end);

        });
    }



}
