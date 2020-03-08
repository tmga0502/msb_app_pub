<?php

namespace App\Libs\Commission;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Csv;
use App\Expenses;
use App\Commissions;

class GetDatas
{


/*
  |--------------------------------------------------------------------------
  | 【CSVデータ】用Method
  |--------------------------------------------------------------------------
*/
  public function csvDatas($year, $month, $user_name, $str)
  {
    if ($month == 1) {
      $this_year = $year - 1;
      $this_month = 12;
    } else {
      $this_year = $year;
      $this_month = $month - 1;
    }
    $unDatas = Csv::where('bank_number', '=', '17')->where('year', '=', $this_year)->where('month', '=', $this_month)->where('person', '=', $user_name)->where('service', '=', $str)->where('check', '=', 0)->get();
    return $unDatas;
  }

  public function csvDatasBankZero($year, $month, $user_name)
  {
    if ($month == 1) {
      $this_year = $year - 1;
      $this_month = 12;
    } else {
      $this_year = $year;
      $this_month = $month - 1;
    }
    $unDatas = Csv::where('bank_number', '=', '0')->where('year', '=', $this_year)->where('month', '=', $this_month)->where('person', '=', $user_name)->get();

    return $unDatas;
  }

  public function csvDatas19($year, $month, $user_name)
  {
    if ($month == 1) {
      $this_year = $year - 1;
      $this_month = 12;
    } else {
      $this_year = $year;
      $this_month = $month - 1;
    }
    $unDatas = Csv::where('bank_number', '=', '19')->where('year', '=', $this_year)->where('month', '=', $this_month)->whereNotIn('nominal', ['契約金', '家賃', 'その他'])->where('person', '=', $user_name)->get();

    return $unDatas;
  }



/*
  |--------------------------------------------------------------------------
  | 【ユーザー名を配列で返す】用Method
  |--------------------------------------------------------------------------
*/
  public function userList()
  {
    $allUser = User::whereNotIn('contract_type', [4])->get();
    $userCount = $allUser->count();
    $userList = [];
    for ($i = 0; $i < $userCount; $i++) {
      array_push($userList, $allUser[$i]->name);
    }
    return $userList;
  }

/*
  |--------------------------------------------------------------------------
  | 【ユーザーidを配列で返す】用Method
  |--------------------------------------------------------------------------
*/
  public function userIDList()
  {
    $allUser = User::whereNotIn('contract_type', [4])->get();
    $userCount = $allUser->count();
    $userIDList = [];
    for ($i = 0; $i < $userCount; $i++) {
      array_push($userIDList, $allUser[$i]->id);
    }
    return $userIDList;
  }



/*
  |--------------------------------------------------------------------------
  | 【個別売上用】用Method
  |--------------------------------------------------------------------------
*/


  //検索条件１
  public function search1($userName, $str, $condition, $date)
  {
    return Commissions::where('user_id', '=', $userName)->where('service', '=', $str)->where($condition, 'like', '%' . $date . '%');
  }

  //検索条件2
  public function search2($userName, $str, $date)
  {
    return Commissions::where('user_id', '=', $userName)->where('service', '=', $str)->where(function ($query) use ($date) {
      $query->where('b_fee_date', 'like', '%' . $date . '%')
        ->orWhere('ad_date', 'like', '%' . $date . '%')
        ->orWhere('am_pm_fee_date', 'like', '%' . $date . '%')
        ->orWhere('o_fee_date', 'like', '%' . $date . '%');
    });
  }

  //検索条件3
  public function search3($userName, $condition, $date)
  {
    return Commissions::where('user_id', '=', $userName)->where($condition, 'like', '%' . $date . '%');
  }

  //検索条件4
  public function search4($userName, $date)
  {
    return Commissions::where('user_id', '=', $userName)->where(function ($query) use ($date) {
      $query->where('b_fee_date', 'like', '%' . $date . '%')
        ->orWhere('ad_date', 'like', '%' . $date . '%')
        ->orWhere('am_pm_fee_date', 'like', '%' . $date . '%')
        ->orWhere('o_fee_date', 'like', '%' . $date . '%');
    });
  }

  //リストを返す
  public function indiviList($userName, $str, $date)
  {
    return $this->search2($userName, $str, $date)->get();
  }

  //小計を返す
  public function indiviSubtotal($userName, $str, $date, $userList)
  {
    $bfSum = $this->search1($userName, $str, 'b_fee_date', $date)->sum('brokerage_fee'); //仲手
    $adSum = $this->search1($userName, $str, 'ad_date', $date)->sum('advertising_fee'); //AD
    $apSum = $this->search1($userName, $str, 'am_pm_fee_date', $date)->sum('am_pm_fee'); //管理報酬
    $ofSum = $this->search1($userName, $str, 'o_fee_date', $date)->sum('outsourcing_fee'); //業務委託料
    $outSum = $this->search2($userName, $str, $date)->sum('outsource'); //外部報酬料
    $sales = intval($bfSum) + intval($adSum) + intval($apSum) + intval($ofSum) - intval($outSum); //売上
    $sales_noTax = intval(floor($sales / 1.1)); //売上(税別)

    //各人の小計
    $userSubtotals = [];
    $comList = $this->search2($userName, $str, $date)->get();
    // 第一段階配列
    $count = 0;
    foreach ($comList as $comList) {
      foreach ($userList as $list) {
        $userSubtotals[$list][$count] = $comList->receiver_percent[$list]['price'];
      }
      $count++;
    }
    // 第二段階配列
    $userSubtotal = array_map(function ($value) {
      return array_sum($value);
    }, array_values($userSubtotals));


    // 会社用小計
    $companySum = $this->search2($userName, $str, $date)->sum('dividend_company');

    return [intval($bfSum), intval($adSum), intval($apSum), intval($ofSum), intval($outSum), $sales, $sales_noTax, $userSubtotal, intval($companySum)];
  }

  //個別まとめ賃貸売上
  public function monthly($array){
    $result = $array[0] + $array[1] + $array[2] + $array[3] - $array[4];
    return $result;
  }


  //合計を返す
  public function indiviTotal($userName, $date, $userList)
  {
    $bfSum = $this->search3($userName, 'b_fee_date', $date)->sum('brokerage_fee'); //仲手
    $adSum = $this->search3($userName, 'ad_date', $date)->sum('advertising_fee'); //AD
    $apSum = $this->search3($userName, 'am_pm_fee_date', $date)->sum('am_pm_fee'); //管理報酬
    $ofSum = $this->search3($userName, 'o_fee_date', $date)->sum('outsourcing_fee'); //業務委託料
    $outSum = $this->search4($userName, $date)->sum('outsource'); //外部報酬料
    $sales = intval($bfSum) + intval($adSum) + intval($apSum) + intval($ofSum) - intval($outSum); //売上
    $sales_noTax = intval(floor($sales / 1.1)); //売上(税別)
// dd($bfSum);
    //各人の小計
    $userSubtotals = [];
    $comList = $this->search4($userName, $date)->get();
    // 第一段階配列
    $count = 0;
    foreach ($comList as $comList) {
      foreach ($userList as $list) {
        $userSubtotals[$list][$count] = $comList->receiver_percent[$list]['price'];
      }
      $count++;
    }
    // 第二段階配列
    $userSubtotal = array_map(function ($value) {
      return array_sum($value);
    }, array_values($userSubtotals));


    // 会社用小計
    $companySum = $this->search4($userName, $date)->sum('dividend_company');

    return [intval($bfSum), intval($adSum), intval($apSum), intval($ofSum), intval($outSum), $sales, $sales_noTax, $userSubtotal, intval($companySum)];
  }






/*
  |--------------------------------------------------------------------------
  | 【全体の売上配分表】用Method
  |--------------------------------------------------------------------------
*/


  //検索条件１
  public function searchAll1($condition, $date)
  {
    return Commissions::where($condition, 'like', '%' . $date . '%');
  }

  //検索条件2
  public function searchAll2($date)
  {
    return Commissions::with('csv')->where(function ($query) use ($date) {
      $query->whereNotIn('customer_name', [''])
        ->where('b_fee_date', 'like', '%' . $date . '%')
        ->orWhere('ad_date', 'like', '%' . $date . '%')
        ->orWhere('am_pm_fee_date', 'like', '%' . $date . '%')
        ->orWhere('o_fee_date', 'like', '%' . $date . '%');
    });
  }

  //リストを返す
  public function allList($date)
  {
    return $this->searchAll2($date)->get();
  }

  //小計を返す
  public function allSubtotal($date, $userList)
  {
    $bfSum = $this->searchAll1('b_fee_date', $date)->sum('brokerage_fee'); //仲手
    $adSum = $this->searchAll1('ad_date', $date)->sum('advertising_fee'); //AD
    $apSum = $this->searchAll1('am_pm_fee_date', $date)->sum('am_pm_fee'); //管理報酬
    $ofSum = $this->searchAll1('o_fee_date', $date)->sum('outsourcing_fee'); //業務委託料
    $outSum = $this->searchAll2($date)->sum('outsource'); //外部報酬料
    $sales = intval($bfSum) + intval($adSum) + intval($apSum) + intval($ofSum) - intval($outSum); //売上
    $sales_noTax = intval(floor($sales / 1.1)); //売上(税別)

    //各人の小計
    $userSubtotals = [];
    $comList = $this->searchAll2($date)->get();
    // 第一段階配列
    $count = 0;
    foreach ($comList as $comList) {
      foreach ($userList as $list) {
        $userSubtotals[$list][$count] = $comList->receiver_percent[$list]['price'];
      }
      $count++;
    }
    // 第二段階配列
    $userSubtotal = array_map(function ($value) {
      return array_sum($value);
    }, array_values($userSubtotals));


    // 会社用小計
    $companySum = $this->searchAll2($date)->sum('dividend_company');

    return [intval($bfSum), intval($adSum), intval($apSum), intval($ofSum), intval($outSum), $sales, $sales_noTax, $userSubtotal, intval($companySum)];
  }


  //合計を返す
  public function allTotal($date, $userList)
  {
    $bfSum = $this->searchAll1('b_fee_date', $date)->sum('brokerage_fee'); //仲手
    $adSum = $this->searchAll1('ad_date', $date)->sum('advertising_fee'); //AD
    $apSum = $this->searchAll1('am_pm_fee_date', $date)->sum('am_pm_fee'); //管理報酬
    $ofSum = $this->searchAll1('o_fee_date', $date)->sum('outsourcing_fee'); //業務委託料
    $outSum = $this->searchAll2($date)->sum('outsource'); //外部報酬料
    $sales = intval($bfSum) + intval($adSum) + intval($apSum) + intval($ofSum) - intval($outSum); //売上
    $sales_noTax = intval(floor($sales / 1.1)); //売上(税別)

    //各人の小計
    $userSubtotals = [];
    $comList = $this->searchAll2($date)->get();
    // 第一段階配列
    $count = 0;
    foreach ($comList as $comList) {
      foreach ($userList as $list) {
        $userSubtotals[$list][$count] = $comList->receiver_percent[$list]['price'];
      }
      $count++;
    }
    // 第二段階配列
    $userSubtotal = array_map(function ($value) {
      return array_sum($value);
    }, array_values($userSubtotals));


    // 会社用
    $companySum = $this->searchAll2($date)->sum('dividend_company');

    return [intval($bfSum), intval($adSum), intval($apSum), intval($ofSum), intval($outSum), $sales, $sales_noTax, $userSubtotal, intval($companySum)];
  }


  //立替経費取得
  public function expense($year, $month, $userIDList)
  {
    $searchMonth = $month - 1;
    $date = $year . '-' . $searchMonth . '-30';
    $partyArray = [];
    $timesArray = [];
    $c_costArray = [];
    $atbb_customerArray = [];
    $regularArray = [];
    $other1Array = [];
    $other2Array = [];
    $other3Array = [];
    $totalArray = [];
    $count = 0;
    $a = ['party', 'times', 'c_cost', 'atbb', 'atbb_customer', 'regular', 'other1', 'other2', 'other3'];
    foreach ($userIDList as $list) {
      $q = Expenses::where('user_id', '=', $list)->where('date', '=', $date);
      // $name = User::where('id', '=', $list)->get(['name']);
      // party集計
      $party = $q->get(['party']);
      $partyArray[] = $this->reStr($party, 'party');
      // dd($partyArray[0]);
      // times集計
      $times = $q->get(['times']);
      $timesArray[] = $this->reStr($times, 'times');
      // c_cost集計
      $c_cost = $q->get(['c_cost']);
      $c_costArray[] = $this->reStr($c_cost, 'c_cost');
      // atbb集計
      $atbb = $q->get(['atbb']);
      $atbbArray[] = $this->reStr($atbb, 'atbb');
      // atbb_customer集計
      $atbb_customer = $q->get(['atbb_customer']);
      $atbb_customerArray[] = $this->reStr($atbb_customer, 'atbb_customer');
      // regular集計
      $regular = $q->get(['regular']);
      $regularArray[] = $this->reStr($regular, 'regular');
      // other1集計
      $other1 = $q->get(['other1']);
      $other1Array[] = $this->reStr($other1, 'other1');
      // other2集計
      $other2 = $q->get(['other2']);
      $other2Array[] = $this->reStr($other2, 'other2');
      // other3集計
      $other3 = $q->get(['other3']);
      $other3Array[] = $this->reStr($other3, 'other3');
      //total集計
      $totalArray[] = $partyArray[$count] + $timesArray[$count] + $c_costArray[$count] + $atbbArray[$count] + $atbb_customerArray[$count] + $regularArray[$count] + $other1Array[$count] + $other2Array[$count] + $other3Array[$count];
      $count ++;
    }
    // dd($timesArray);
    return [$partyArray, $timesArray, $c_costArray, $atbbArray, $atbb_customerArray, $regularArray, $other1Array, $other2Array, $other3Array, $totalArray];
  }
  //立替経費Array作成Method
  public function reStr($array, $str){
    if(isset($array[0])){
        $reStr = $array[0]->$str;
      }else{
        $reStr = 0;
      }
    return $reStr;
  }



  //源泉計算
  public function tax($year, $month, $userIDList, $rewardArray)
  {
    $searchMonth = $month - 1;
    $date = $year . '-' . $searchMonth . '-30';
    $typyArray = [];
    $taxArray = [];
    for ($i = 0; $i < count($userIDList); $i++) {
      $q = User::where('id', '=', $userIDList[$i])->first();
      // $typyArray[] = $q->contract_type;
      if ($q->contract_type == 0) {
        if ($rewardArray[$i] >= 1000000) {
          $tax = ($rewardArray[$i] - 1000000) * 0.2042 + (1000000 * 0.1021);
        } elseif ($rewardArray[$i] <= 0) {
          $tax = 0;
        } else {
          $tax = $rewardArray[$i] * 0.1021;
        }
      } else {
        // 正社員の場合は別クラスに渡す。
        // とりあえず3を返しとく。
        $tax = 3;
      }
      $taxArray[] = intval(floor($tax));
    }

    return $taxArray;
  }


/*
  |--------------------------------------------------------------------------
  | 【リレーション使用】用Method
  |--------------------------------------------------------------------------
*/

  public function relayMethod($user_name, $date, $str){
    $result = Commissions::where(function ($query) use ($date) {
      $query->where('b_fee_date', 'like', '%' . $date . '%')
        ->orWhere('ad_date', 'like', '%' . $date . '%');
    })
      ->where('user_id', '=', $user_name)->where('service', '=', $str)->get();

    return $result;
  }


}
