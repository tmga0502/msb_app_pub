<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\WorkTime;

class WorkTimeController extends Controller
{
/*
|--------------------------------------------------------------------------
| 労働時間管理トップ
|--------------------------------------------------------------------------
*/
    public function getTop($now_year, $now_month, $now_day){

    $user_id = Auth::user()->id;
	$year = $now_year;
	if($now_month < 10){
		$month = '0' . $now_month;
	}else{
		$month = $now_month;
	}
	if($now_day < 10){
		$day = '0' . $now_day;
	}else{
		$day = $now_day;
	}
	$date = $year . '-' . $month . '-' . $day;
    $check = WorkTime::where('user_id', '=', $user_id)->where('date', '=', $date)->exists();

    if($check == true){
    	$flag = 1;
    }else{
    	$flag = 0;
    }

     return view('workTime.top',compact('now_year', 'now_month', 'now_day', 'flag'));
    }


/*
|--------------------------------------------------------------------------
| 労働時間管理トップ
|--------------------------------------------------------------------------
*/
	public function getList($now_year, $now_month, $now_day){


		return view('workTime.list',compact('now_year', 'now_month', 'now_day'));
	}






/*
|--------------------------------------------------------------------------
| 労働時間登録
|--------------------------------------------------------------------------
*/
	public function create(Request $request){
		$user_id = $request->user_id;
		$year = $request->year;
		if($request->month < 10){
			$month = '0' . $request->month;
		}else{
			$month = $request->month;
		}
		if($request->day < 10){
			$day = '0' . $request->day;
		}else{
			$day = $request->day;
		}
		$date = $year . '-' . $month . '-' . $day;
		$start = $request->start;
		$end = $request->end;
		$break = $request->break;

	
		//DBインサート
		$workTime = new WorkTime([
			'user_id' => $user_id,
			'date' => $date,
			'start' => $start,
			'end' => $end,
			'break' => $break
		]);
		//保存
		$workTime->save();

		$dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        return redirect()->route('workTime.top', compact('now_year', 'now_month', 'now_day'));
    	

	}


}
