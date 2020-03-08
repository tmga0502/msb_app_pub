<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReservationRule;

class ReservationRequest extends FormRequest
{


    public function all($keys = null)
    {
        $results = parent::all($keys);
        if($results['start_hour'] < 10){
            $results['start_hour'] = '0' . $results['start_hour'];
        }
        if($results['start_minutes'] == 0){
            $results['start_minutes'] = '0' . $results['start_minutes'];
        }
        $results['start_at'] = $results['start_hour'] . ':' . $results['start_minutes'];
        if($results['end_hour'] < 10){
            $results['end_hour'] = '0' . $results['end_hour'];
        }
        if($results['end_minutes'] == 0){
            $results['end_minutes'] = '0' . $results['end_minutes'];
        }
        $results['end_at'] = $results['end_hour'] . ':' . $results['end_minutes'];

        if($results['create_month'] < 10){
            $results['create_month'] = '0' . $results['create_month'];
        }
        if($results['create_day'] < 10){
            $results['create_day'] = '0' . $results['create_day'];
        }

        $results['date'] = $results['create_year'] . '-' . $results['create_month'] . '-' . $results['create_day'];
        return $results;
    }



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'space_name' => 'required',
            'purpose' => 'required',
            'description' => 'required',
            'start_at' => [
                new ReservationRule(
                    $this -> space_name,
                    $this -> start_at,
                    $this -> end_at,
                    $this -> date,
                    $this -> originallyID
                )
            ]

        ];
    }



}
