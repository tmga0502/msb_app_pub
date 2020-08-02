<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Schedule;
use App\Libs\Reserve;
use App\Http\Requests\ReservationRequest;

class ReserveController extends Controller
{


/*
  |--------------------------------------------------------------------------
  | 現時刻
  |--------------------------------------------------------------------------
*/
    public function nowTime(){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        return [$dt, $year, $month, $day];
    }

/*
  |--------------------------------------------------------------------------
  | マイページ表示
  |--------------------------------------------------------------------------
*/
    public function getMypage(){
        list($dt, $year, $month, $day) = $this->nowTime();
        $dates_instance = new Reserve\GetCalendarDates;
        $dates = $dates_instance->getCalendarDates($year,$month);

        // userIDの取得
        $userID = Auth::user()->id;
        // Scheduleから、userID && 今日以降のものを取得
        $userSchedule = Schedule::where('user_id', '=', $userID)->where('date', '>=', $dt->format('Y-m-d'))->orderBy('date','asc')->paginate(10);
        $url = url('/') . '/reserve_description/';

        return view('reservation.mypage',  compact('dates','year', 'month','day', 'userSchedule', 'dt', 'url'));
    }

/*
  |--------------------------------------------------------------------------
  | 設備予約home表示
  |--------------------------------------------------------------------------
*/
    public function getReserveHome(){
        list($dt, $year, $month, $day) = $this->nowTime();

        return view('reservation.home',  compact('year', 'month','day'));
    }


/*
  |--------------------------------------------------------------------------
  | 設備予約Top表示
  |--------------------------------------------------------------------------
*/
    public function getTop($year, $month, $day){
    //カレンダー用
        $dates_instance = new Reserve\GetCalendarDates;
        $dates = $dates_instance->getCalendarDates($year,$month);

    //予約状況一覧用
        // 【インスタンス化】
        $schedule_instance = new Reserve\GetSchedule;
        //予約データ取得→クラスに渡す
        if($month < 10){$month = 0 . $month;}  //10以下なら頭に0をつける
        if($day < 10){$day = 0 . $day;}  //10以下なら頭に0をつける
        $date = $year .'-' . $month . '-' . $day;

        //【Aスペースの予定作成】
        $data_A = Schedule::where('date', '=',  $date)->where('space_name', '=', 'Aスペース')->orderBy('start_time', 'asc');
        if ($data_A->exists()){
            $ID_A = $data_A->pluck('id');
            $userID_A = $data_A->pluck('user_id');
            $spaceName_A = $data_A->pluck('space_name');
            $purpose_A = $data_A->pluck('purpose');
            $description_A = $data_A->pluck('description');
            $startTime_A = $data_A->pluck('start_time');
            $endTime_A = $data_A->pluck('end_time');
        }else{
            $ID_A = [];
            $userID_A = [];
            $spaceName_A = ['Aスペース'];
            $purpose_A = [];
            $description_A = [];
            $startTime_A =  [];
            $endTime_A = [];
        }
        $schedule_A = $schedule_instance->getScheduleTop($ID_A, $userID_A, $spaceName_A, $purpose_A, $description_A, $startTime_A, $endTime_A);

        //【Bスペースの予定作成】
        $data_B = Schedule::where('date', '=',  $date)->where('space_name', '=', 'Bスペース')->orderBy('start_time', 'asc');
        if ($data_B->exists()){
            $ID_B = $data_B->pluck('id');
            $userID_B = $data_B->pluck('user_id');
            $spaceName_B = $data_B->pluck('space_name');
            $purpose_B = $data_B->pluck('purpose');
            $description_B = $data_B->pluck('description');
            $startTime_B = $data_B->pluck('start_time');
            $endTime_B = $data_B->pluck('end_time');
        }else{
            $ID_B = [];
            $userID_B = [];
            $spaceName_B = ['Bスペース'];
            $purpose_B = [];
            $description_B = [];
            $startTime_B =  [];
            $endTime_B = [];
        }
        $schedule_B = $schedule_instance->getScheduleTop($ID_B, $userID_B, $spaceName_B, $purpose_B, $description_B, $startTime_B, $endTime_B);

        //【Cスペースの予定作成】
        $data_C = Schedule::where('date', '=',  $date)->where('space_name', '=', 'Cスペース')->orderBy('start_time', 'asc');
        if ($data_C->exists()){
            $ID_C = $data_C->pluck('id');
            $userID_C = $data_C->pluck('user_id');
            $spaceName_C = $data_C->pluck('space_name');
            $purpose_C = $data_C->pluck('purpose');
            $description_C = $data_C->pluck('description');
            $startTime_C = $data_C->pluck('start_time');
            $endTime_C = $data_C->pluck('end_time');
        }else{
            $ID_C = [];
            $userID_C = [];
            $spaceName_C = ['Cスペース'];
            $purpose_C = [];
            $description_C = [];
            $startTime_C =  [];
            $endTime_C = [];
        }
        $schedule_C = $schedule_instance->getScheduleTop($ID_C, $userID_C, $spaceName_C, $purpose_C, $description_C, $startTime_C, $endTime_C);

        //【印鑑の予定作成】
        $data_I = Schedule::where('date', '=',  $date)->where('space_name', '=', '印鑑')->orderBy('start_time', 'asc');
        if ($data_I->exists()){
            $ID_I = $data_I->pluck('id');
            $userID_I = $data_I->pluck('user_id');
            $spaceName_I = $data_I->pluck('space_name');
            $purpose_I = $data_I->pluck('purpose');
            $description_I = $data_I->pluck('description');
            $startTime_I = $data_I->pluck('start_time');
            $endTime_I = $data_I->pluck('end_time');
        }else{
            $ID_I = [];
            $userID_I = [];
            $spaceName_I = ['印鑑'];
            $purpose_I = [];
            $description_I = [];
            $startTime_I =  [];
            $endTime_I = [];
        }
        $schedule_I = $schedule_instance->getScheduleTop($ID_I, $userID_I, $spaceName_I, $purpose_I, $description_I, $startTime_I, $endTime_I);

        //【ZOOMの予定作成】
        $data_Z = Schedule::where('date', '=',  $date)->where('space_name', '=', 'ZOOM')->orderBy('start_time', 'asc');
        if ($data_Z->exists()){
            $ID_Z = $data_Z->pluck('id');
            $userID_Z = $data_Z->pluck('user_id');
            $spaceName_Z = $data_Z->pluck('space_name');
            $purpose_Z = $data_Z->pluck('purpose');
            $description_Z = $data_Z->pluck('description');
            $startTime_Z = $data_Z->pluck('start_time');
            $endTime_Z = $data_Z->pluck('end_time');
        }else{
            $ID_Z = [];
            $userID_Z = [];
            $spaceName_Z = ['ZOOM'];
            $purpose_Z = [];
            $description_Z = [];
            $startTime_Z =  [];
            $endTime_Z = [];
        }
        $schedule_Z = $schedule_instance->getScheduleTop($ID_Z, $userID_Z, $spaceName_Z, $purpose_Z, $description_Z, $startTime_Z, $endTime_Z);


    //リターン
        return view('reservation.top',compact('dates','year', 'month','day', 'schedule_A', 'schedule_B', 'schedule_C', 'schedule_I', 'schedule_Z'));
    }




/*
  |--------------------------------------------------------------------------
  | 設備予約新規ページ表示
  |--------------------------------------------------------------------------
*/
    public function getCreate($year, $month, $day){
    //カレンダー用
        $dates_instance = new Reserve\GetCalendarDates;
        $dates = $dates_instance->getCalendarDates($year,$month);

    //予約状況一覧用
        // インスタンス化
        $schedule_instance = new Reserve\GetSchedule;

        //タイムゾーン取得
        $tzList = $schedule_instance->getTimeZoneCreate();

        //予約データ取得→クラスに渡す
        if($month < 10){$month = 0 . $month;}  //10以下なら頭に0をつける
        if($day < 10){$day = 0 . $day;}  //10以下なら頭に0をつける
        $date = $year .'-' . $month . '-' . $day;
        //【Aスペース】
        $data_A = Schedule::where('date', '=',  $date)->where('space_name', '=', 'Aスペース');
        if ($data_A->exists()){
            $spaceName_A = $data_A->pluck('space_name');
            $startTime_A = $data_A->pluck('start_time');
            $endTime_A = $data_A->pluck('end_time');
        }else{
            $spaceName_A = ['Aスペース'];
            $startTime_A =  [];
            $endTime_A = [];
        }
        //AスペのHTML作成
        $schedule_A = $schedule_instance->getTScheduleCreate($spaceName_A, $startTime_A, $endTime_A);


        //【Bスペース】
        $data_B = Schedule::where('date', '=',  $date)->where('space_name', '=', 'Bスペース');
        if ($data_B->exists()){
            $spaceName_B = $data_B->pluck('space_name');
            $startTime_B = $data_B->pluck('start_time');
            $endTime_B = $data_B->pluck('end_time');
        }else{
            $spaceName_B = ['Bスペース'];
            $startTime_B =  [];
            $endTime_B = [];
        }
        //BスペのHTML作成
        $schedule_B = $schedule_instance->getTScheduleCreate($spaceName_B, $startTime_B, $endTime_B);


        //【Cスペース】
        $data_C = Schedule::where('date', '=',  $date)->where('space_name', '=', 'Cスペース');
        if ($data_C->exists()){
            $spaceName_C = $data_C->pluck('space_name');
            $startTime_C = $data_C->pluck('start_time');
            $endTime_C = $data_C->pluck('end_time');
        }else{
            $spaceName_C = ['Cスペース'];
            $startTime_C =  [];
            $endTime_C = [];
        }
        //CスペのHTML作成
        $schedule_C = $schedule_instance->getTScheduleCreate($spaceName_C, $startTime_C, $endTime_C);


        //【印鑑】
        $data_I = Schedule::where('date', '=',  $date)->where('space_name', '=', '印鑑');
        if ($data_I->exists()){
            $spaceName_I = $data_I->pluck('space_name');
            $startTime_I = $data_I->pluck('start_time');
            $endTime_I = $data_I->pluck('end_time');
        }else{
            $spaceName_I = ['印鑑'];
            $startTime_I =  [];
            $endTime_I = [];
        }
        //印鑑のHTML作成
        $schedule_I = $schedule_instance->getTScheduleCreate($spaceName_I, $startTime_I, $endTime_I);

        //【ZOOM】
        $data_Z = Schedule::where('date', '=',  $date)->where('space_name', '=', 'ZOOM');
        if ($data_Z->exists()){
            $spaceName_Z = $data_Z->pluck('space_name');
            $startTime_Z = $data_Z->pluck('start_time');
            $endTime_Z = $data_Z->pluck('end_time');
        }else{
            $spaceName_Z = ['ZOOM'];
            $startTime_Z =  [];
            $endTime_Z = [];
        }
        //ZOOMのHTML作成
        $schedule_Z = $schedule_instance->getTScheduleCreate($spaceName_Z, $startTime_Z, $endTime_Z);



    //リターン
        return view('reservation.create',compact('dates','year', 'month','day', 'tzList', 'schedule_A', 'schedule_B', 'schedule_C', 'schedule_I', 'schedule_Z'));
    }






/*
  |--------------------------------------------------------------------------
  | 設備予約新規登録
  |--------------------------------------------------------------------------
*/
    public function postCreate(ReservationRequest $request){

        $year = $request->input('create_year');
        $month = $request->input('create_month');
        $day = $request->input('create_day');
        $dates_instance = new Reserve\GetCalendarDates;
        $dates = $dates_instance->getCalendarDates($year,$month);

        // dateの作成
        $date = $year.'-'.$month.'-'.$day;

        // startTimeの作成
        $startTime = $request->input('start_hour').':'.$request->input('start_minutes');

        // endTimeの作成
        $endTime = $request->input('end_hour').':'.$request->input('end_minutes');

        //バリデーション【終了-開始=マイナスの処理】
        //【時間のフォーマット】
        $sTime = Carbon::parse($startTime)->format('H:i');
        $eTime = Carbon::parse($endTime)->format('H:i');
        if($endTime > $startTime){
            // $msg = '開始時刻を終了時刻より前に設定してください';
            $errorTime = 'NG';
        }

        //バリデートしてDBへ保存
        //詳細は【https://blog.capilano-fw.com/?p=1317】を参照
        \App\Schedule::create([
            'user_id' => $request->user_id,
            'space_name' => $request->space_name,
            'purpose' => $request->purpose,
            'description' => $request->description,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'date' => $date
        ]);

        // リダイレクト
        return redirect()->route('reservation.create', compact('dates','year', 'month','day')) ;

    }



/*
  |--------------------------------------------------------------------------
  | 設備予約登録変更
  |--------------------------------------------------------------------------
*/
    public function postUpdate(ReservationRequest $request){

        $id = $request->input('originallyID');
        $year = $request->input('create_year');
        $month = $request->input('create_month');
        $day = $request->input('create_day');
        $dates_instance = new Reserve\GetCalendarDates;
        $dates = $dates_instance->getCalendarDates($year,$month);

        // dateの作成
        $date = $year.'-'.$month.'-'.$day;

        // startTimeの作成
        $startTime = $request->input('start_hour').':'.$request->input('start_minutes');

        // endTimeの作成
        $endTime = $request->input('end_hour').':'.$request->input('end_minutes');

        //バリデーション【終了-開始=マイナスの処理】
        //【時間のフォーマット】
        $sTime = Carbon::parse($startTime)->format('H:i');
        $eTime = Carbon::parse($endTime)->format('H:i');
        if($endTime > $startTime){
            // $msg = '開始時刻を終了時刻より前に設定してください';
            $errorTime = 'NG';
        }

        $update = Schedule::find($id);
        $update -> user_id = $request->user_id;
        $update -> space_name = $request->space_name;
        $update -> purpose = $request->purpose;
        $update -> description = $request->description;
        $update -> start_time = $startTime;
        $update -> end_time = $endTime;
        $update -> date = $date;
        $update -> save();

        return redirect()->route('reservation.top',['year' => $year, 'month' => $month, 'day' => $day]) ;


    }


/*
|--------------------------------------------------------------------------
| 設備予約詳細ページ表示
|--------------------------------------------------------------------------
*/
    public function description($ID){
        $context = Schedule::where('id', '=',  $ID)->first();
        $dt = Carbon::now();
        $year = substr($context->date, 0, 4);
        $month = substr($context->date, 5, 2);
        $day = substr($context->date, 8, 2);
        $dates_instance = new Reserve\GetCalendarDates;
        $dates = $dates_instance->getCalendarDates($year,$month);
        return view('reservation.description', compact('context','dates','year', 'month','day'));
    }



/*
|--------------------------------------------------------------------------
| 設備予約削除Method
|--------------------------------------------------------------------------
*/
    public function remove(Request $request){
        $context = Schedule::find($request->id);
        $dt = Carbon::now();
        $year = substr($context->date, 0, 4);
        $month = substr($context->date, 5, 2);
        $day = substr($context->date, 8, 2);
        $dates_instance = new Reserve\GetCalendarDates;
        $dates = $dates_instance->getCalendarDates($year,$month);
        $context->delete();
        return redirect()->route('reservation.top', compact('dates','year', 'month','day')) ;
    }


}
