<?php namespace App\Libs\Root;

use Auth;
use Carbon\Carbon;
use App\User;
use App\Expenses;
use App\Csv;
use App\Commissions;

/*
  |--------------------------------------------------------------------------
  |経費一覧を作成するためのClass
  |--------------------------------------------------------------------------
*/

class Transfer {


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
  | 【振込額一覧】用Method
  |--------------------------------------------------------------------------
*/

  //検索条件１
  public function searchAll1($condition, $date)
  {
    return Commissions::where($condition, 'like', '%' . $date . '%');
  }


  //合計を返す
  public function allTotal($date, $userList)
  {
    $bfSum = $this->searchAll1('b_fee_date', $date)->sum('brokerage_fee'); //仲手
    $adSum = $this->searchAll1('ad_date', $date)->sum('advertising_fee'); //AD
    $apSum = $this->searchAll1('am_pm_fee_date', $date)->sum('am_pm_fee'); //管理報酬
    $ofSum = $this->searchAll1('o_fee_date', $date)->sum('outsourcing_fee'); //業務委託料
    $sales = intval($bfSum) + intval($adSum) + intval($apSum) + intval($ofSum); //売上
    $sales_noTax = intval(floor($sales / 1.1)); //売上(税別)

    // Commissionから当月のデータを取得
    $comLists = Commissions::where(function ($query) use ($date) {
      $query->where('b_fee_date', 'like', '%' . $date . '%')
      ->orWhere('ad_date', 'like', '%' . $date . '%')
      ->orWhere('am_pm_fee_date', 'like', '%' . $date . '%')
      ->orWhere('o_fee_date', 'like', '%' . $date . '%');
    });
    dd($comLists);

    // userListをloopして、各人の合計額を出す
    foreach($userList as $list){

    }


    return [intval($bfSum), intval($adSum), intval($apSum), intval($ofSum), intval($outSum), $sales, $sales_noTax, $userSubtotal, intval($companySum)];
  }
}
