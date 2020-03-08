<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CustomerInformation;
use App\Detail;

class DetailController extends Controller
{
/*
  |--------------------------------------------------------------------------
  | 顧客新規登録->詳細情報更新
  |--------------------------------------------------------------------------
*/
    public function detailsUpdate(Request $request){
        $id = $request->id;
        $birthday = ($request->birthday == '') ? null : $request->birthday;
        $partner_birthday = ($request->partner_birthday == '') ? null : $request->partner_birthday;
        $child1_birthday = ($request->child1_birthday == '') ? null : $request->child1_birthday;
        $child2_birthday = ($request->child2_birthday == '') ? null : $request->child2_birthday;
        $age = ($request->age == '') ? 0 : $request->age;
        $customerList = CustomerInformation::find($id)->detail();
        $detailsList = Detail::where('customer_information_id', '=', $id)->first();
        if(isset($detailsList)){
            $customerList->update([
            'sex' => $request->sex,
            'born' => $request->born,
            'birthday' => $birthday,
            'age' => $age,
            'partner' => $request->partner,
            'child' => $request->child,
            'partner_name' => $request->partner_name,
            'partner_birthday' => $partner_birthday,
            'child1_name' => $request->child1_name,
            'child1_birthday' => $child1_birthday,
            'child2_name' => $request->child2_name,
            'child2_birthday' => $child2_birthday,
            'relation' => $request->relation,
            'encount' => $request->encount,
            'hope' => $request->hope,
            'job' => $request->job,
            'position' => $request->position,
            'hoby' => $request->hoby,
            'dream' => $request->dream,
            'other' => $request->other
            ]);
            }else{
            $customerList->create([
            'customer_information_id' => $id,
            'sex' => $request->sex,
            'born' => $request->born,
            'birthday' => $birthday,
            'age' => $age,
            'partner' => $request->partner,
            'child' => $request->child,
            'partner_name' => $request->partner_name,
            'partner_birthday' => $partner_birthday,
            'child1_name' => $request->child1_name,
            'child1_birthday' => $child1_birthday,
            'child2_name' => $request->child2_name,
            'child2_birthday' => $child2_birthday,
            'relation' => $request->relation,
            'encount' => $request->encount,
            'hope' => $request->hope,
            'job' => $request->job,
            'position' => $request->position,
            'hoby' => $request->hoby,
            'dream' => $request->dream,
            'other' => $request->other
            ]);
            }

        return redirect()->route('c_data.c_detail', compact('id')) ;

    }
}
