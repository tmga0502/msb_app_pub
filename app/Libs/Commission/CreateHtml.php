<?php

namespace App\Libs\Commission;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Csv;
use App\Expenses;
use App\Commissions;

class CreateHtml
{


/*
  |--------------------------------------------------------------------------
  | HTML用日付作成Method
  |--------------------------------------------------------------------------
*/
  public function createDate($year, $month, $day){
    $result = '';
    if($month < 10 and $day < 10){
      $result = $year . '-0' . $month . '-0' . $day;
    }elseif($day < 10){
      $result = $year . '-' . $month . '-0' . $day;
    }else{
      $result = $year . '-' . $month . '-' . $day;
    }
    return $result;
  }

/*
  |--------------------------------------------------------------------------
  | HTML用備考分割Method
  |--------------------------------------------------------------------------
*/
  public function strSplit($str){
    $strings = str_replace(array("\r\n", "\r", "\n"), '', $str);
    $strArray = explode(',', $strings);
    $result = [];
    foreach($strArray as $array){
      $start = mb_strpos($array,'：')+1;
      $end = mb_strpos($array,'円');
      $result[] = mb_substr($array, $start, $end-$start);
    }
    return $result;
  }

/*
  |--------------------------------------------------------------------------
  | HTML作成Method
  |--------------------------------------------------------------------------
*/
  public function distribution($i, $array, $userList){
    $result = '';
    // 外部紹介料
      $result .=
      '<td><input type="number" name="outsource[' . $i . ']" value="' . $array[$i-1]->commissions->outsource . '" style="text-align:right;"></td>';

      // レート選択
      $result .=
      '<td style="white-space:nowrap;">
        <select name="rate[' . $i . ']">';
        if($array[$i-1]->commissions->rate == 0){
          $result .=
          '<option value="0" selected>新レート</option>
          <option value="1">旧レート</option>';
        }else{
          $result .=
          '<option value="0">新レート</option>
          <option value="1" selected>旧レート</option>';
        }
        $result .=
        '</select>
      </td>';

      // レート上限
      $result .=
      '<td>
        <input type="number"max="100" name="maxRate[' . $i . ']" style="width:50px;" value="' . $array[$i-1]->commissions->maxRate . '">
      </td>
      <td>％</td>';

      // 個別配分
      $count = 0;
      foreach( $userList as $user){
        $result .=
        '<td style="white-space:nowrap;">
          <input type="hidden" name="user[' . $i . '][' . $count . ']" value="' . $user . '">';

          if( $array[$i-1]->commissions->receiver_percent == null){
            $result .=
            '<input type="number" max="100" name="receiver_percent[' . $i . '][' . $count . ']" style="width:50px;text-align:right;">
                </td>
            <td>％</td>';
          }else{
            $result .=
            '<input type="number" max="100" name="receiver_percent[' . $i . '][' . $count . ']" style="width:50px;text-align:right;" value="' . $array[$i-1]->commissions->receiver_percent[$user]['rate'] . '">
                </td>
            <td>％</td>';
          }
          if( $array[$i-1]->commissions->receiver_percent == null){
            $result .=
              '<td style="white-space:nowrap;">
                <input type="text" max="100" name="receiver_percent[' . $i . '][' . $count . ']" style="width:100px;text-align:right;" readonly>
              </td>
              <td>円</td>';
          }else{
            $result .=
              '<td style="white-space:nowrap;">
                <input type="text" max="100" name="receiver_price[' . $i . '][' . $count . ']" style="width:100px;text-align:right;" value="' . number_format($array[$i-1]->commissions->receiver_percent[$user]['price']) . '" readonly>
              </td>
              <td>円</td>';
          }
          $count += 1;
      }

      // 会社配分
      $result .=
      '<td>
        <input type="number" max="100" name="percent_company[' . $i . ']" style="width:50px;" value="' . $array[$i-1]->commissions->percent_company . '">
      </td>
      <td>％</td>
      <td style="white-space:nowrap;">
        <input type="text" max="100" name="dividend_company[' . $i . ']" style="width:100px;text-align:right;" value="' . number_format($array[$i-1]->commissions->dividend_company) . '" readonly>
      </td>
      <td>円</td>';

      // 備考
      $result .=
      '<td style="white-space:nowrap;">' .
         $array[$i-1]->remark .
      '</td>
    </tr>';
    return $result;
  }

  public function htmlButton(){
      $result =
      '<tr>
        <td>
          <div class="text-center submit">
            <button type="submit" name="save" class="btn-xs btn-red">登録する</button>
          </div>
        </td>
        <td colspan=21></td>
      </tr>';

      return $result;
  }

/*
  |--------------------------------------------------------------------------
  | 賃貸用Method
  |--------------------------------------------------------------------------
*/
  public function rent($array, $userList)
  {
    $htmlStrings = '';
    for( $i = 1; $i < count($array) + 1; $i++){
      // id
      $htmlStrings .=
      '<input type="hidden" name="csv_id[' . $i.  ']" value="' . $array[$i-1]->id . '"><tr>';

      // お客様名
      $htmlStrings .=
      '<td>
        <input type="text" name="customer_name[' . $i . ']" value="' . $array[$i-1]->commissions->customer_name . '">
      </td>';

      // 振り込み名
      $htmlStrings .=
      '<td style="white-space:nowrap;">' .
         $array[$i-1]->name .
      '</td>';

      // 物件名
      $htmlStrings .=
      '<td>
        <input id="apartmentName" type="text" name="apartment_name[' . $i . ']" value="' .  $array[$i-1]->commissions->apartment_name . '">
      </td>';

      // 部屋番号
      $htmlStrings .=
      '<td>
        <input id="" type="text" name="room[' . $i . ']" value="' . $array[$i-1]->commissions->room . '">
      </td>';

      // 管理会社名
      $htmlStrings .=
      '<td>
        <input id="" type="text" name="company[' . $i . ']" value="' . $array[$i-1]->commissions->company . '">
      </td>';

      // 仲手とADの振り分け
      $date = $this->createDate($array[$i-1]->year , $array[$i-1]->month ,$array[$i-1]->day);
      if($array[$i-1]->nominal == '仲介手数料'){
        $htmlStrings .=
        '<td>
          <input id="" type="text" name="brokerage_fee[' . $i . ']" style="text-align:right;width:100px;" value="' . number_format($array[$i-1]->price) . '" readonly>
        </td>
        <td style="white-space:nowrap;">
          <input class="form-control" type="date" name="b_fee_date[' . $i . ']" value="' . $date . '" readonly>
        </td>
        <td>
          <input id="" type="text" name="advertising_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="ad_date[' . $i . ']" value=null readonly>
        </td>
        <td>
          <input id="" type="text" name="outsourcing_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="o_fee_date[' . $i . ']" value=null readonly>
        </td>';
      }elseif($array[$i-1]->nominal == '広告料'){
        $htmlStrings .=
        '<td>
            <input id="" type="text" name="brokerage_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
          </td>
          <td>
            <input class="form-control" type="date" name="b_fee_date[' . $i . ']" value=null readonly>
          </td>
          <td>
            <input id="" type="text" name="advertising_fee[' . $i . ']" style="text-align:right;width:100px;" value="' . number_format($array[$i-1]->price) . '" readonly>
          </td>
          <td>
            <input class="form-control" type="date" name="ad_date[' . $i . ']" value="' . $date . '" readonly>
          </td>
          <td>
            <input id="" type="text" name="outsourcing_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
          </td>
          <td>
            <input class="form-control" type="date" name="o_fee_date[' . $i . ']" value=null readonly>
          </td>';
      }elseif($array[$i-1]->nominal == '契約金等'){
        list($st1, $st2, $st3) = $this->strSplit($array[$i-1]->remark);
        $htmlStrings .=
        '<td>
          <input type="text" name="brokerage_fee[' . $i . ']" style="text-align:right;width:100px;" value=' . number_format($st2) . '>
        </td>';
        if($st2 == 0){
          $htmlStrings .=
          '<td style="white-space:nowrap;">
            <input class="form-control" type="date" name="b_fee_date[' . $i . ']" value="null" readonly>
          </td>';
        }else{
          $htmlStrings .=
          '<td style="white-space:nowrap;">
            <input class="form-control" type="date" name="b_fee_date[' . $i . ']" value="' . $date . '" readonly>
          </td>';
        }
        $htmlStrings .=
        '<td>
          <input id="" type="text" name="advertising_fee[' . $i . ']" style="text-align:right;width:100px;" value=' . number_format($st3) . '>
        </td>';
        if($st3 == 0){
          $htmlStrings .=
          '<td>
            <input class="form-control" type="date" name="ad_date[' . $i  . ']" value="null" readonly>
          </td>';
        }else{
          $htmlStrings .=
          '<td>
            <input class="form-control" type="date" name="ad_date[' . $i  . ']" value="' . $date . '" readonly>
          </td>';
        }
        $htmlStrings .=
        '<td>
          <input id="" type="text" name="outsourcing_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="o_fee_date[' . $i . ']" value=null readonly>
        </td>';
      }elseif($array[$i-1]->nominal == '紹介料' || $array[$i-1]->nominal == '業務委託料'){
        $htmlStrings .=
        '<td>
          <input id="" type="text" name="brokerage_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="b_fee_date[' . $i . ']" value=null readonly>
        </td>
        <td>
          <input id="" type="text" name="advertising_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="ad_date[' . $i . ']" value=null readonly>
        </td>
        <td>
          <input id="" type="text" name="outsourcing_fee[' . $i . ']" style="text-align:right;width:100px;" value="' . number_format($array[$i-1]->price) . '" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="o_fee_date[' . $i . ']" value="' . $date . '" readonly>
        </td>';
      }
    // 共通部分
    $htmlStrings .= $this->distribution($i, $array, $userList);

    }


     return $htmlStrings;
  }

/*
  |--------------------------------------------------------------------------
  | 売買用Method
  |--------------------------------------------------------------------------
*/
  public function trade($array, $userList)
  {
    $htmlStrings = '';
    for( $i = 1; $i < count($array) + 1; $i++){
      // id
      $htmlStrings .=
      '<tr><input type="hidden" name="csv_id[' . $i.  ']" value="' . $array[$i-1]->id . '">';

      // 買主
      $htmlStrings .=
      '<td>
        <input type="text" name="customer_name[' . $i . ']" value="' . $array[$i-1]->commissions->customer_name . '">
      </td>';

      // 売主
      $htmlStrings .=
      '<td>
        <input type="text" name="seller_name[' . $i . ']" value="' . $array[$i-1]->commissions->seller_name . '">
      </td>';

      // 振り込み名
      $htmlStrings .=
      '<td style="white-space:nowrap;">' .
         $array[$i-1]->name .
      '</td>';

      // 物件名
      $htmlStrings .=
      '<td>
        <input id="apartmentName" type="text" name="apartment_name[' . $i . ']" value="' .  $array[$i-1]->commissions->apartment_name . '">
      </td>';

      // 部屋番号
      $htmlStrings .=
      '<td>
        <input id="" type="text" name="room[' . $i . ']" value="' . $array[$i-1]->commissions->room . '">
      </td>';

      // 仲手とADの振り分け
      $date = $this->createDate($array[$i-1]->year , $array[$i-1]->month ,$array[$i-1]->day);
      if($array[$i-1]->nominal == '仲介手数料'){
        $htmlStrings .=
        '<td>
          <input id="" type="text" name="brokerage_fee[' . $i . ']" style="text-align:right;width:100px;" value="' . number_format($array[$i-1]->price) . '" readonly>
        </td>
        <td style="white-space:nowrap;">
          <input class="form-control" type="date" name="b_fee_date[' . $i . ']" value="' . $date . '" readonly>
        </td>
        <td>
          <input id="" type="text" name="outsourcing_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="o_fee_date[' . $i . ']" value=null readonly>
        </td>';
      }elseif($array[$i-1]->nominal == '契約金等'){
        list($st1, $st2, $st3) = $this->strSplit($array[$i-1]->remark);
        $htmlStrings .=
        '<td>
          <input type="text" name="brokerage_fee[' . $i . ']" style="text-align:right;width:100px;" value=' . number_format($st2) . '>
        </td>';
        if($st2 == 0){
          $htmlStrings .=
          '<td style="white-space:nowrap;">
            <input class="form-control" type="date" name="b_fee_date[' . $i . ']" value="null" readonly>
          </td>';
        }else{
          $htmlStrings .=
          '<td style="white-space:nowrap;">
            <input class="form-control" type="date" name="b_fee_date[' . $i . ']" value="' . $date . '" readonly>
          </td>';
        }
        $htmlStrings .=
        '<td>
          <input id="" type="text" name="outsourcing_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="o_fee_date[' . $i . ']" value=null readonly>
        </td>';
      }elseif($array[$i-1]->nominal == '紹介料' || $array[$i-1]->nominal == '業務委託料'){
        $htmlStrings .=
        '<td>
          <input id="" type="text" name="brokerage_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="b_fee_date[' . $i . ']" value=null readonly>
        </td>
        <td>
          <input id="" type="text" name="outsourcing_fee[' . $i . ']" style="text-align:right;width:100px;" value="' . number_format($array[$i-1]->price) . '" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="o_fee_date[' . $i . ']" value="' . $date . '" readonly>
        </td>';
      }
    // 共通部分
    $htmlStrings .= $this->distribution($i, $array, $userList);

    }


     return $htmlStrings;
  }


/*
  |--------------------------------------------------------------------------
  | 管理用Method
  |--------------------------------------------------------------------------
*/
  public function html19($array, $userList)
  {
    $htmlStrings = '';
    for( $i = 1; $i < count($array) + 1; $i++){
      // id
      $htmlStrings .=
      '<input type="hidden" name="id[' . $i.  ']" value="' . $array[$i-1]->commissions->id . '">';

      // csv_id
      $htmlStrings .=
      '<input type="hidden" name="csv_id[' . $i.  ']" value="' . $array[$i-1]->id . '">';

      // お客様名
      $htmlStrings .=
      '<td>
        <input type="text" name="customer_name[' . $i . ']" value="' . $array[$i-1]->commissions->customer_name . '">
      </td>';

      // 振り込み名
      $htmlStrings .=
      '<td style="white-space:nowrap;">' .
         $array[$i-1]->name .
      '</td>';

      // 物件名
      $htmlStrings .=
      '<td>
        <input id="apartmentName" type="text" name="apartment_name[' . $i . ']" value="' .  $array[$i-1]->commissions->apartment_name . '">
      </td>';

      // 提供サービス
      $htmlStrings .=
      '<td style="white-space:nowrap;">
        <select name="service[' . $i . ']" class="form-control">
        <option value="PMフィー">PMフィー</option>
        <option value="鍵交換">鍵交換</option>
        <option value="火災保険">火災保険</option>
        <option value="保証会社代理店手数料">保証会社代理店手数料</option>
        <option value="その他">その他</option>
        </select>
      </td>';

      // pmフィー
      $date = $this->createDate($array[$i-1]->year , $array[$i-1]->month ,$array[$i-1]->day);
        $htmlStrings .=
        '<td>
          <input id="" type="text" name="am_pm_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td style="white-space:nowrap;">
          <input class="form-control" type="date" name="am_pm_fee_date[' . $i . ']" value=null readonly>
        </td>
        <td>
          <input id="" type="text" name="outsourcing_fee[' . $i . ']" style="text-align:right;width:100px;" value="' . number_format($array[$i-1]->price) . '" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="o_fee_date[' . $i . ']" value=' . $date . ' readonly>
        </td>';
    // 共通部分
    $htmlStrings .= $this->distribution($i, $array, $userList);

    }
     return $htmlStrings;
  }

  public function FeeHtml($array, $userList, $count19)
  {
    $htmlStrings = '';
    $iCount = $count19 + 1;
    for( $i = $iCount; $i < count($array) + $iCount; $i++){
      // id
      $htmlStrings .=
      '<input type="hidden" name="id[' . $i.  ']" value="' . $array[$i-$iCount]->id . '">';

      // csv_id
      $htmlStrings .=
      '<tr><input type="hidden" name="csv_id[' . ($i).  ']" value="">';

      // お客様名
      $htmlStrings .=
      '<td>
        <input type="text" name="customer_name[' . $i . ']" value="' . $array[$i-$iCount]->customer_name . '">
      </td>';

      // 振り込み名
      $htmlStrings .=
      '<td style="white-space:nowrap;"></td>';

      // 物件名
      $htmlStrings .=
      '<td>
        <input id="apartmentName" type="text" name="apartment_name[' . ($i) . ']" value="' .  $array[$i-$iCount]->apartment_name . '">
      </td>';

      // 提供サービス
      $htmlStrings .=
      '<td style="white-space:nowrap;">
        <select name="service[' . ($i) . ']" class="form-control">
        <option value="PMフィー">PMフィー</option>
        <option value="鍵交換">鍵交換</option>
        <option value="火災保険">火災保険</option>
        <option value="保証会社代理店手数料">保証会社代理店手数料</option>
        <option value="その他">その他</option>
        </select>
      </td>';

      // pmフィー
        $htmlStrings .=
        '<td>
          <input id="" type="text" name="am_pm_fee[' . ($i) . ']" style="text-align:right;width:100px;" value="' . $array[$i-$iCount]->am_pm_fee . '">
        </td>
        <td style="white-space:nowrap;">
          <input class="form-control" type="date" name="am_pm_fee_date[' . ($i) . ']" value="' .  $array[$i-$iCount]->am_pm_fee_date . '">
        </td>
        <td>
          <input id="" type="text" name="outsourcing_fee[' . ($i) . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="o_fee_date[' . ($i) . ']" value=null readonly>
        </td>';

    // 外部紹介料
      $htmlStrings .=
      '<td><input type="number" name="outsource[' . ($i) . ']"style="text-align:right;"></td>';

      // レート選択
      $htmlStrings .=
      '<td style="white-space:nowrap;">
        <select name="rate[' . ($i) . ']">
          <option value="0" selected>新レート</option>
          <option value="1">旧レート</option>
        </select>
      </td>';

      // レート上限
      $htmlStrings .=
      '<td>
        <input type="number"max="100" name="maxRate[' . ($i) . ']" style="width:50px;">
      </td>
      <td>％</td>';

      // 個別配分
      $count = 0;
      foreach( $userList as $user){
        $htmlStrings .=
        '<td style="white-space:nowrap;">
          <input type="hidden" name="user[' . ($i) . '][' . $count . ']" value="' . $user . '">';

          if( $array[$i-$iCount]->receiver_percent == null){
            $htmlStrings .=
            '<input type="number" max="100" name="receiver_percent[' . ($i) . '][' . $count . ']" style="width:50px;text-align:right;">
                </td>
            <td>％</td>';
          }else{
            $htmlStrings .=
            '<input type="number" max="100" name="receiver_percent[' . ($i) . '][' . $count . ']" style="width:50px;text-align:right;" value="' . $array[$i-$iCount]->receiver_percent[$user]['rate'] . '">
                </td>
            <td>％</td>';
          }
          if( $array[$i-$iCount]->receiver_percent == null){
            $htmlStrings .=
              '<td style="white-space:nowrap;">
                <input type="text" max="100" name="receiver_percent[' . ($i) . '][' . $count . ']" style="width:100px;text-align:right;" readonly>
              </td>
              <td>円</td>';
          }else{
            $htmlStrings .=
              '<td style="white-space:nowrap;">
                <input type="text" max="100" name="receiver_price[' . ($i) . '][' . $count . ']" style="width:100px;text-align:right;" value="' . number_format($array[$i-$iCount]->receiver_percent[$user]['price']) . '" readonly>
              </td>
              <td>円</td>';
          }
          $count += 1;
      }

      // 会社配分
      $htmlStrings .=
      '<td>
        <input type="number" max="100" name="percent_company[' . $i . ']" style="width:50px;">
      </td>
      <td>％</td>
      <td style="white-space:nowrap;">
        <input type="text" max="100" name="dividend_company[' . $i . ']" style="width:100px;text-align:right;" readonly>
      </td>
      <td>円</td>';

      // 備考
      $htmlStrings .=
      '<td style="white-space:nowrap;"></td>
    </tr>';

    }

     return $htmlStrings;
  }

  public function noFeeHtml($array, $userList, $countRegi)
  {
    $htmlStrings = '';
    $i = 1 + $countRegi;
    foreach( $array as $a ){
      // id
      $htmlStrings .=
      '<input type="hidden" name="id[' . $i.  ']" value="">';

      // csv_id
      $htmlStrings .=
      '<input type="hidden" name="csv_id[' . $i .  ']" value="">';

      // お客様名
      $htmlStrings .=
      '<td>
        <input type="text" name="customer_name[' . $i . ']">
      </td>';

      // 振り込み名
      $htmlStrings .=
      '<td style="white-space:nowrap;"></td>';

      // 物件名
      $htmlStrings .=
      '<td>
        <input id="apartmentName" type="text" name="apartment_name[' . $i . ']" value="' .  $a->property_name . '">
      </td>';

      // 提供サービス
      $htmlStrings .=
      '<td style="white-space:nowrap;">
        <select name="service[' . $i . ']" class="form-control">
        <option value="PMフィー">PMフィー</option>
        <option value="鍵交換">鍵交換</option>
        <option value="火災保険">火災保険</option>
        <option value="保証会社代理店手数料">保証会社代理店手数料</option>
        <option value="その他">その他</option>
        </select>
      </td>';

      // pmフィー
        $htmlStrings .=
        '<td>
          <input id="" type="text" name="am_pm_fee[' . $i . ']" style="text-align:right;width:100px;">
        </td>
        <td style="white-space:nowrap;">
          <input class="form-control" type="date" name="am_pm_fee_date[' . $i . ']">
        </td>
        <td>
          <input id="" type="text" name="outsourcing_fee[' . $i . ']" style="text-align:right;width:100px;" value="0" readonly>
        </td>
        <td>
          <input class="form-control" type="date" name="o_fee_date[' . $i . ']" value=null readonly>
        </td>';

    // 外部紹介料
      $htmlStrings .=
      '<td><input type="number" name="outsource[' . $i . ']"style="text-align:right;"></td>';

      // レート選択
      $htmlStrings .=
      '<td style="white-space:nowrap;">
        <select name="rate[' . $i . ']">
          <option value="0" selected>新レート</option>
          <option value="1">旧レート</option>
        </select>
      </td>';

      // レート上限
      $htmlStrings .=
      '<td>
        <input type="number"max="100" name="maxRate[' . $i . ']" style="width:50px;">
      </td>
      <td>％</td>';

      // 個別配分
      $count = 0;
      foreach( $userList as $user){
        $htmlStrings .=
        '<td style="white-space:nowrap;">
          <input type="hidden" name="user[' . $i . '][' . $count . ']" value="' . $user . '">

            <input type="number" max="100" name="receiver_percent[' . $i . '][' . $count . ']" style="width:50px;text-align:right;">
                </td>
            <td>％</td>
            <td style="white-space:nowrap;">
              <input type="text" max="100" name="receiver_price[' . $i . '][' . $count . ']" style="width:100px;text-align:right;" readonly>
            </td>
            <td>円</td>';
          $count += 1;
      }

      // 会社配分
      $htmlStrings .=
      '<td>
        <input type="number" max="100" name="percent_company[' . $i . ']" style="width:50px;">
      </td>
      <td>％</td>
      <td style="white-space:nowrap;">
        <input type="text" max="100" name="dividend_company[' . $i . ']" style="width:100px;text-align:right;" readonly>
      </td>
      <td>円</td>';

      // 備考
      $htmlStrings .=
      '<td style="white-space:nowrap;"></td>
    </tr>';

    $i += 1;
    }


     return $htmlStrings;
  }


}
