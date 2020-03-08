<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CustomerInformation;
use App\Flow;

class FlowController extends Controller
{
/*
  |--------------------------------------------------------------------------
  | 顧客新規登録->審査後フロー更新
  |--------------------------------------------------------------------------
*/
    public function flowUpdate(Request $request){
        $id = $request->id;

        $customerList = CustomerInformation::find($id)->flow();
        $flow = Flow::where('customer_information_id', '=', $id)->first();

        if(isset($flow)){
            $customerList->update([
            'required_documents' => $request->required_documents,
            'contract_location' => $request->contract_location,
            'settlement' => $request->settlement,
            'life_line' => $request->life_line,
            'confirmation' => $request->confirmation,
            'guarantor' => $request->guarantor,
            'hand_ovre_kye' => $request->hand_ovre_kye,
            'contract_procedures' => $request->contract_procedures,
            'ADs_invoice' => $request->ADs_invoice
            ]);
        }else{
            $customerList->create([
            'customer_information_id' => $id,
            'required_documents' => $request->required_documents,
            'contract_location' => $request->contract_location,
            'settlement' => $request->settlement,
            'life_line' => $request->life_line,
            'confirmation' => $request->confirmation,
            'guarantor' => $request->guarantor,
            'hand_ovre_kye' => $request->hand_ovre_kye,
            'contract_procedures' => $request->contract_procedures,
            'ADs_invoice' => $request->ADs_invoice
            ]);
        }

        return redirect()->route('c_data.c_detail', compact('id')) ;

    }
}
