<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\CustomerInformation;
use \App\PropertyInformation;

class PropertyInformationController extends Controller
{
/*
  |--------------------------------------------------------------------------
  | 顧客新規登録->物件情報更新
  |--------------------------------------------------------------------------
*/
    public function propertyInformationUpdate(Request $request){
        $id = $request->id;
        $first_code = ($request->first_code == '') ? 0 : $request->first_code;
        $last_code = ($request->last_code == '') ? 0 : $request->last_code;
        $contract_start = ($request->contract_start == '') ? null : $request->contract_start;
        $contract_end = ($request->contract_end == '') ? null : $request->contract_end;

        $customerList = CustomerInformation::find($id)->propertyInformation();
        $propertyInformationList = PropertyInformation::where('customer_information_id', '=', $id)->first();

        if(isset($propertyInformationList)){
            $customerList->update([
            'first_code' => $first_code,
            'last_code' => $last_code,
            'prefecture' => $request->prefecture,
            'city' => $request->city,
            'address' => $request->address,
            'apartment_name' => $request->apartment_name,
            'room_number' => $request->room_number,
            'real_estate_agent' => $request->real_estate_agent,
            'person_in_charge' => $request->person_in_charge,
            'tel' => $request->tel,
            'fax' => $request->fax,
            'contract_start' => $contract_start,
            'contract_end' => $contract_end,
            ]);
        }else{
            $customerList->create([
            'customer_information_id' => $id,
            'first_code' => $first_code,
            'last_code' => $last_code,
            'prefecture' => $request->prefecture,
            'city' => $request->city,
            'address' => $request->address,
            'apartment_name' => $request->apartment_name,
            'room_number' => $request->room_number,
            'real_estate_agent' => $request->real_estate_agent,
            'person_in_charge' => $request->person_in_charge,
            'tel' => $request->tel,
            'fax' => $request->fax,
            'contract_start' => $contract_start,
            'contract_end' => $contract_end,
            ]);
        }

        return redirect()->route('c_data.c_detail', compact('id')) ;

    }
}
