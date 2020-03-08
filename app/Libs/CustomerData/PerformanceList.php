<?php

namespace App\Libs\CustomerData;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CustomerInformation;

class PerformanceList
{
	public function pList($period, $year, $month){
		$start_date = $year . '-' . $month . '-01';
		$end_date = $year . '-' . $month . '-31';
		$performanceList = [];
		$q = CustomerInformation::where('status', '=', '完了')->where('introducer', '=', '【賃貸】自己案件')->whereHas('sales', function($query) use ($start_date, $end_date) {
		        $query->whereBetween('bf_payment', [$start_date, $end_date]);
		    })->get();
		
		// dd($q);
		// R_rent_my
		// R_rent_int
		// R_rent_out
	    // R_rent_salesInt
	    // R_rent_salesInt_com 
	    // R_trade_my
	    // R_trade_int
	    // R_trade_ou
	    // R_trade_salesInt
	    // R_trade_salesInt_com
	    // R_other1
	    // R_other2
	    // R_other3 
	    // R_manage
	    // S_rent_my 
	    // S_rent_int
	    // S_rent_out
	    // S_rent_salesInt
	    // S_rent_salesInt_com
	    // S_trade_my
	    // S_trade_int
	    // S_trade_out 
	    // S_trade_salesInt
	    // S_trade_salesInt_com
	    // S_other1
	    // S_other2
	    // S_other3
	    // S_manage
	}
}