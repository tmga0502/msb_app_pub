<?php namespace App\Libs\Root;

use Auth;
use Carbon\Carbon;
use App\User;
use App\Expenses;

/*
  |--------------------------------------------------------------------------
  |経費一覧を作成するためのClass
  |--------------------------------------------------------------------------
*/

class GetSumArray {

/*
  |--------------------------------------------------------------------------
  |立替経費合計年間の個別経費作成
  |--------------------------------------------------------------------------
*/
  public function costArray($year){
    $str = ['party', 'times', 'c_cost', 'atbb', 'atbb_customer', 'regular', 'other1', 'other2', 'other3'];
    $monthArray = [];
    $strArray = [];
    $sumArray = [];
    $sumMonthArray = [];
      //ユーザーの個数をカウント（masterは除く）
      $user_count = User::whereNotIn('name', ['musubiya'])->count();
      $user_name =  User::get(['name']);
      $count = 1;
      foreach($user_name as $user){

      //12ヶ月分ループ
      for($j = 1; $j < 14; $j++){
        $date = $year . '-' . $j . '-30';
        //経費名・年月・ユーザー名で絞り込み
        $array = Expenses::select($str)->where('date', '=', $date)->join('users', 'expenses.user_id', '=', 'users.id')->where('name', '=', $user->name)->first();

        //該当データがあれば金額を入れる
        if(isset($array)){
            $monthArray[$j] = $array->party + $array->times + $array->c_cost + $array->atbb + $array->atbb_customer + $array->regular + $array->other1 + $array->other2 + $array->other3;
        }else{ //該当データがなければ0を入れる
          $monthArray[$j] = 0;
        }

        if($j === 13){
          $monthArray[13] = array_sum($monthArray);
        }
      }
      //まるっと配列に追加
      $strArray[$user->name] = $monthArray;
      $count++;
    }
    return $strArray;
  }


/*
  |--------------------------------------------------------------------------
  |立替経費合計各月の個別経費合計作成
  |--------------------------------------------------------------------------
*/
  public function costSumArray($year){
    $str = ['party', 'times', 'c_cost', 'atbb', 'atbb_customer', 'regular', 'other1', 'other2', 'other3'];
    $monthArray = [];
    $sumArray = [];
    $count = 1;
    for($i = 1; $i < 13; $i++){
        $date = $year . '-' . $i . '-30';
        //経費名・年月・ユーザー名で絞り込み
        $array = Expenses::select($str)->where('date', '=', $date)->join('users', 'expenses.user_id', '=', 'users.id')->get()->ToArray();
        foreach($array as $ar){
          $monthArray[] = $ar['party'] + $ar['times'] + $ar['c_cost'] + $ar['atbb'] + $ar['atbb_customer'] + $ar['regular'] + $ar['other1'] + $ar['other2'] + $ar['other3'];
        }
        $sumArray[$i] = array_sum($monthArray);
        $monthArray = [];
    }
    $sumArray[13] = array_sum($sumArray);
    return $sumArray;
  }




/*
  |--------------------------------------------------------------------------
  |年間の個別経費作成
  |--------------------------------------------------------------------------
*/
  public function usersArray($year, $str){
    $monthArray = [];
    $strArray = [];
    $sumArray = [];
    $sumMonthArray = [];
      //ユーザーの個数をカウント（masterは除く）
      $user_count = User::whereNotIn('name', ['musubiya'])->count();
      $user_name =  User::get(['name']);
      $count = 1;
      foreach($user_name as $user){

      //12ヶ月分ループ
      for($j = 1; $j < 14; $j++){
        $date = $year . '-' . $j . '-30';
        //経費名・年月・ユーザー名で絞り込み
        $array = Expenses::select($str)->where('date', '=', $date)->join('users', 'expenses.user_id', '=', 'users.id')->where('name', '=', $user->name)->first();

        //該当データがあれば金額を入れる
        if(isset($array->$str)){
          $monthArray[$j] = $array->$str;
        }else{ //該当データがなければ0を入れる
          $monthArray[$j] = 0;
        }

        if($j === 13){
          $monthArray[13] = array_sum($monthArray);
        }
      }
      //まるっと配列に追加
      $strArray[$user->name] = $monthArray;
      $count++;
    }

    return $strArray;
  }



/*
  |--------------------------------------------------------------------------
  |各月の個別経費合計作成
  |--------------------------------------------------------------------------
*/
  public function sumArray($year, $str){
    $monthArray = [];
    $sumArray = [];
    $count = 1;
    for($i = 1; $i < 13; $i++){
        $date = $year . '-' . $i . '-30';
        //経費名・年月・ユーザー名で絞り込み
        $array = Expenses::select($str)->where('date', '=', $date)->join('users', 'expenses.user_id', '=', 'users.id')->get()->ToArray();
        foreach($array as $ar){
          $monthArray[] = $ar[$str];
        }
        $sumArray[$i] = array_sum($monthArray);
        $monthArray = [];
    }
    $sumArray[13] = array_sum($sumArray);
    return $sumArray;
  }



/*
  |--------------------------------------------------------------------------
  |ATBB用年間の個別経費作成
  |--------------------------------------------------------------------------
*/
  public function atbb($year, $str, $str2){
    $monthArray_atbb = [];
    $monthArray_atbb_cus = [];
    $monthArray_atbb_sum = [];
    $strArray = [];
    $sumArray = [];
    $sumMonthArray = [];
      //ユーザーの個数をカウント（masterは除く）
      $user_count = User::whereNotIn('name', ['musubiya'])->count();
      $user_name =  User::get(['name']);
      $count = 1;
      foreach($user_name as $user){

      //12ヶ月分ループ
      for($j = 1; $j < 14; $j++){
        $date = $year . '-' . $j . '-30';
        //経費名・年月・ユーザー名で絞り込み
        $array = Expenses::select($str, $str2)->where('date', '=', $date)->join('users', 'expenses.user_id', '=', 'users.id')->where('name', '=', $user->name)->first();

        //該当データがあれば金額を入れる
        if(isset($array->$str)){
          $monthArray_atbb[$j] = $array->$str;
          $monthArray_atbb_cus[$j] = $array->$str2;
          $monthArray_atbb_sum[$j] =  $array->$str + $array->$str2;
        }else{ //該当データがなければ0を入れる
          $monthArray_atbb[$j] = 0;
          $monthArray_atbb_cus[$j] = 0;
          $monthArray_atbb_sum[$j] = 0;
        }

        if($j === 13){
          $monthArray_atbb[13] = array_sum($monthArray_atbb);
          $monthArray_atbb_cus[13] = array_sum($monthArray_atbb_cus);
          $monthArray_atbb_sum[13] = array_sum($monthArray_atbb_sum);
        }
      }
      //まるっと配列に追加
      $strArray[$user->name] = [$monthArray_atbb, $monthArray_atbb_cus, $monthArray_atbb_sum];
      $count++;
    }

    return $strArray;
  }

/*
  |--------------------------------------------------------------------------
  |ATBB用各月の個別経費合計作成
  |--------------------------------------------------------------------------
*/
  public function atbbSum($year, $str, $str2){
    $monthArray = [];
    $sumArray = [];
    $count = 1;
    for($i = 1; $i < 13; $i++){
        $date = $year . '-' . $i . '-30';
        //経費名・年月・ユーザー名で絞り込み
        $array = Expenses::select($str, $str2)->where('date', '=', $date)->join('users', 'expenses.user_id', '=', 'users.id')->get()->ToArray();
        foreach($array as $ar){
          $monthArray[] = $ar[$str];
          $monthArray[] = $ar[$str2];
        }
        $sumArray[$i] = array_sum($monthArray);
        $monthArray = [];
      }
      $sumArray[13] = array_sum($sumArray);
    return $sumArray;
  }


/*
  |--------------------------------------------------------------------------
  |その他控除用年間の個別経費作成
  |--------------------------------------------------------------------------
*/
  public function oters($year, $strList){
    $other1 = $strList[0];
    $other1_remark = $strList[1];
    $other2 = $strList[2];
    $other2_remark = $strList[3];
    $other3 = $strList[4];
    $other3_remark = $strList[5];
    $other1_sum = [];
    $other2_sum = [];
    $other3_sum = [];
    $monthArray_othes1 = [];
    $monthArray_othes2 = [];
    $monthArray_othes3 = [];
    $monthArray_othes_sum = [];
    //ユーザーの個数をカウント（masterは除く）
    $user_count = User::whereNotIn('name', ['musubiya'])->count();
    $user_name =  User::get(['name']);
    $count = 1;
    foreach($user_name as $user){

      //12ヶ月分ループ
      for($j = 1; $j < 14; $j++){
        $date = $year . '-' . $j . '-30';
        //経費名・年月・ユーザー名で絞り込み
        $array = Expenses::select($strList)->where('date', '=', $date)->join('users', 'expenses.user_id', '=', 'users.id')->where('name', '=', $user->name)->first();
        //該当データがあれば金額を入れる
        if(isset($array)){
          $monthArray_othes1[$j] = [
            $array->$other1, $array->$other1_remark
          ];
          $monthArray_othes2[$j] = [
            $array->$other2, $array->$other2_remark
          ];
          $monthArray_othes3[$j] = [
            $array->$other3, $array->$other3_remark
          ];
          $other1_sum[] = $array->$other1;
          $other2_sum[] = $array->$other2;
          $other3_sum[] = $array->$other3;
          $monthArray_othes_sum[$j] =  $array->$other1 + $array->$other2+ $array->$other3;
        }else{ //該当データがなければ0を入れる
          $monthArray_othes1[$j] = [0, ''];
          $monthArray_othes2[$j] = [0, ''];
          $monthArray_othes3[$j] = [0, ''];
          $other1_sum[] = 0;
          $other2_sum[] = 0;
          $other3_sum[] = 0;
          $monthArray_othes_sum[$j] = 0;
        }

        if($j === 13){
          $monthArray_othes1[13] = [array_sum($other1_sum), ''];
          $monthArray_othes2[13] = [array_sum($other2_sum), ''];
          $monthArray_othes3[13] = [array_sum($other3_sum), ''];
          $monthArray_othes_sum[13] = array_sum($monthArray_othes_sum);
          $other1_sum = [];
          $other2_sum = [];
          $other3_sum = [];
        }
      }
      //まるっと配列に追加
      $strArray[$user->name] = [$monthArray_othes1, $monthArray_othes2, $monthArray_othes3, $monthArray_othes_sum];
      $count++;
    }
    return $strArray;
  }



/*
  |--------------------------------------------------------------------------
  |その他控除用各月の個別経費合計作成
  |--------------------------------------------------------------------------
*/
  public function othersSum($year, $strList){
    $other1 = $strList[0];
    $other2 = $strList[2];
    $other3 = $strList[4];
    $monthArray = [];
    $sumArray = [];
    $count = 1;
    for($i = 1; $i < 13; $i++){
        $date = $year . '-' . $i . '-30';
        //経費名・年月・ユーザー名で絞り込み
        $array = Expenses::select($other1, $other2, $other3)->where('date', '=', $date)->join('users', 'expenses.user_id', '=', 'users.id')->get()->ToArray();
        foreach($array as $ar){
          $monthArray[] = $ar[$other1];
          $monthArray[] = $ar[$other2];
          $monthArray[] = $ar[$other3];
        }
        $sumArray[$i] = array_sum($monthArray);
        $monthArray = [];
      }
      $sumArray[13] = array_sum($sumArray);
    return $sumArray;
  }
}
