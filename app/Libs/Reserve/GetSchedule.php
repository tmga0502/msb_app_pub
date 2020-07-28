<?php namespace App\Libs\Reserve;

use Auth;
use Carbon\Carbon;
use App\User;
use App\Schedule;

/*
  |--------------------------------------------------------------------------
  | 設備予約ページの予約一覧を作成するためのClass
  |--------------------------------------------------------------------------
*/
class GetSchedule {

//propertiy
  public $topHour;
  public $bottomHour;
  public $totalHour;
  public $minutesHeight;
  public $hourHeight;
  public $maxHeight;
  public $timeName;

//constructor
  public function __construct(){
    $this->topHour = 7;  //表示のスタート時間
    $this->bottomHour = 24;  //表示の終了時間
    $this->totalHour = $this->bottomHour - $this->topHour;  //表示の終了時間 - 表示のスタート時間
    $this->minutesHeight =  10;  //15分で7.5px
    $this->hourHeight = $this->minutesHeight * 4;  //1時間で30px
    $this->maxHeight = 20 + $this->hourHeight * $this->totalHour;
    $timeNameList = [];
    for ($i = $this->topHour; $i < $this->bottomHour; $i++){
      for ($j = 0; $j < 60; $j = $j +  15){
        if ($i < 10 && $j == 0){
          $timeNameList[] = '0' . $i . ':0' . $j ;
        }elseif($i < 10 && $j != 0){
          $timeNameList[] = '0' . $i . ':' . $j ;
        }elseif($i >= 10 && $j == 0){
          $timeNameList[] = $i . ':0' . $j ;
        }else{
          $timeNameList[] = $i . ':' . $j ;
        }
      }
    }
    $this->timeName = $timeNameList;  //HTML埋め込みname用　時間リスト
  }




/*
  |--------------------------------------------------------------------------
  | 設備予約Top用の予約状況一覧のメッセージ作成Method
  |--------------------------------------------------------------------------
*/
  public function makeMessage($userID, $spaceName, $purpose, $description, $startTime, $endTime){

    //入力用テキストの作成
    $msg = [];
    for ($i = 0; $i < count($startTime); $i++){
      //【時間のフォーマット】
      $sTime = Carbon::parse($startTime[$i])->format('H:i');
      $eTime = Carbon::parse($endTime[$i])->format('H:i');
      // メッセージ作成
      $msg[] = $sTime . '〜' . $eTime .'<br>' . $purpose[$i] . '<br>' .$description[$i];
    }
    return $msg;
  }





/*
  |--------------------------------------------------------------------------
  | 設備予約Top用の予約状況一覧の予定ブロックの作成ethod
  |--------------------------------------------------------------------------
*/
  public function makeBlock($ID, $userID, $spaceName, $purpose, $description, $startTime, $endTime){
    //テキストの呼び出し
    $msg = $this->makeMessage($userID, $spaceName, $purpose, $description, $startTime, $endTime);
    // user tableからそれぞれのデータ分$userIDを引っ張ってくる
    $user = [];
    for ($i = 0; $i < count($userID); $i++){
      $user[] = User::where('id', '=', $userID[$i])->get()->ToArray();
    }
    //自分のユーザー情報の取得
    $myID = Auth::user();

    //superUserなら
    $base_html = [];
    $routeID = $ID;
    for($j = 0; $j < count($user); $j++){
      $userID = $user[$j][0]['id'];
      if($myID->superUser == 1 ){
        $base_html[] = '<a href="' . url('/') . '/reserve_description/' . $routeID[$j] . '">
                <div style="height:70px;border: 1px solid darkgray;border-radius: 1em;margin:4px;font-size:1em;color:black;background-color:skyblue;">
                <p style="font-size:1.1rem;">' . $msg[$j] . '</p>
                </div></a>';
      }elseif( $userID == $myID->id ){
        $base_html[] = '<a href="' . url('/') . '/reserve_description/' . $routeID[$j] . '">
                <div style="height:70px;border: 1px solid darkgray;border-radius: 1em;margin:4px;font-size:1em;color:black;background-color:skyblue;">
                <p style="font-size:1.1rem;">' . $msg[$j] . '</p>
                </div></a>';
      }else{
        $base_html[] = '<div style="height:70px;border: 1px solid darkgray;border-radius: 1em;margin:4px;font-size:1em;color:black;background-color:silver;">
                <p style="font-size:1.1rem;">' . $msg[$j] . '</p>
                </div>';
      }
    }
    return $base_html;
  }






/*
  |--------------------------------------------------------------------------
  | 設備予約Top用の予約状況一覧Method
  |--------------------------------------------------------------------------
*/
  public function getScheduleTop($ID, $userID, $spaceName, $purpose, $description, $startTime, $endTime){

    if(isset($startTime)){
      $base_html = $this->makeBlock($ID, $userID, $spaceName, $purpose, $description, $startTime, $endTime);
      //スケジュールの作成
      $scheArray = [];
      $scheArray[] = '<div class="col minute-wrapper" style="height:700px;text-align: center; border: 1px solid darkgray;">';
      $scheArray[] = '<div style="height:20px;border-bottom: 1px solid darkgray;" class="space_css">' . $spaceName[0] . '</div>';

      //予定があれば
        for($i = 0; $i < count($base_html); $i++){
          $scheArray[] = $base_html[$i];
        }
        $scheArray[] = '</div>';
      }
      //予定がなければ
      else{
        $scheArray[] = '<div></div></div>';
      }
      return $scheArray;


  }







/*
  |--------------------------------------------------------------------------
  | 設備予約新規用の予約状況一覧Method
  |--------------------------------------------------------------------------
*/
  //TimeZone作成Method(7:00,8:00etc)
  public function getTimeZoneCreate(){
    $tzArray = [];
    $tzArray[] = '<div class="col" style="height:'. $this->maxHeight . 'px;">';  //全体のdiv
    $tzArray[] = '<div style="height:20px;" class="reserve_hour_top"></div>';  //上部空白部分
    for ($i = 7; $i < 24; $i++){
        if($i == 23){
          $tzArray[] = '<div style="height:' . $this->hourHeight . 'px;" class="reserve_hour_bottom">' . $i . ':00</div>';
        }else{
          $tzArray[] = '<div style="height:' . $this->hourHeight . 'px;" class="reserve_hour_body">' . $i . ':00</div>';
        }
    }
    $tzArray[] = '</div>';

    return $tzArray;
    }



/*
  |--------------------------------------------------------------------------
  | Schedule作成Method
  |--------------------------------------------------------------------------
*/
  public function getTScheduleCreate($spaceName, $startTime, $endTime){

    //$startTimeから$endTimeまでの時間差を配列に格納
    $diffTime = [];
    $countTime = 0;
    for ($i = 0; $i < count($startTime); $i++){
      $dtStart = Carbon::parse($startTime[$i]);
      $dtEnd = Carbon::parse($endTime[$i])->subMinutes(15);
      $countTime = $dtStart->diffInMinutes($dtEnd) / 15;

      foreach ($this->timeName as $tn) {
        $checkTime = Carbon::parse($tn);
        if($checkTime->between($dtStart, $dtEnd)){ //startとendの間に含まれているかのチェック
          $diffTime[] = $checkTime->format('H:i');
        }
      }
    }


    $scheArray = [];
    $scheArray[] = '<div class="col" style="height:'. $this->maxHeight . 'px;">';  //全体のdiv
    $scheArray[] = '<div style="height:20px;" class= "s_name">' . $spaceName[0] . '</div>';  //スペース名

    //スペースのbody作成
    $s_name = substr($spaceName[0], 0, 1);
    $html_front_color = '<div style="height:' . $this->minutesHeight . 'px; background-color: coral;" class="reserve_space_';
    $html_front_Nocolor =  '<div style="height:' . $this->minutesHeight . 'px;" class="reserve_space_';
    $html_back = ' "></div>';
    foreach ($this->timeName as $key => $value) {
        if (($key+4) % 4 == 0 && in_array($value, $diffTime)){  //色付きtop
          $scheArray[] = $html_front_color. 'top" id=" ' . $value . $s_name .  $html_back;
        }elseif(($key+4) % 4 == 0){  //色なしtop
          $scheArray[] = $html_front_Nocolor . 'top" id=" ' . $value . $s_name .  $html_back;
        }elseif (($key+4) % 4 == 3 && in_array($value, $diffTime)){  //色付きbottom
        $scheArray[] = $html_front_color. 'bottom" id=" ' . $value . $s_name . $html_back;
        }elseif (($key+4) % 4 == 3){  //色なしbottom
          $scheArray[] = $html_front_Nocolor . 'bottom" id=" ' . $value . $s_name . $html_back;
        }elseif (($key+4) % 4 == 1 && in_array($value, $diffTime)){  //色付きbody1
          $scheArray[] = $html_front_color . 'body" id=" ' . $value . $s_name . $html_back;
        }elseif (($key+4) % 4 == 1 ){  //色なしbody1
          $scheArray[] = $html_front_Nocolor . 'body" id=" ' . $value . $s_name . $html_back;
        }elseif (($key+4) % 4 == 2 && in_array($value, $diffTime)){  //色付きbody2
          $scheArray[] = $html_front_color . 'body" id=" ' . $value . $s_name . $html_back;
        }else{  //色なしbody2
          $scheArray[] = $html_front_Nocolor . 'body" id=" ' . $value . $s_name . $html_back;
      }
    }

    $scheArray[] = '</div>';  //全体の閉じdiv


    return $scheArray;
  }


}
