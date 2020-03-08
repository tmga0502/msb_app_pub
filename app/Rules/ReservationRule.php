<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReservationRule implements Rule
{

    private $_spase_name,
            $_start_at,
            $_end_at,
            $_date,
            $_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($space_name, $start_at, $end_at, $date, $id)
    {
        $this -> _space_name = $space_name;
        $this -> _start_at = $start_at;
        $this -> _end_at = $end_at;
        $this -> _date = $date;
        $this -> _id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //更新時
        if(isset($this->_id)){
            $flags = \App\Schedule::where('id', '!=', $this->_id)->where('date', $this->_date)
                ->where('space_name', '=',  $this->_space_name)
                ->whereHasReservation($this->_start_at, $this->_end_at)
                ->doesntExist() && $this->_end_at > $this->_start_at;
            return $flags;
        }
        //新規登録
        else{
            $flags = \App\Schedule::where('date', $this->_date)
                ->where('space_name', $this->_space_name)
                ->whereHasReservation($this->_start_at, $this->_end_at)
                ->doesntExist() && $this->_end_at > $this->_start_at;
            return $flags;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '既に予定があるか、時間の入力に誤りがあります。';
    }
}
