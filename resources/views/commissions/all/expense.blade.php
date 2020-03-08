  <tr id="indivi_th_tr" style="background-color: #eee;">
    <td style="text-align:center;white-space:nowrap;">【立替経費】</td>
    <td colspan=21 style="text-align:right;"></td>
    @foreach( $userList as $user)
    <td colspan=2 style="text-align:center;" name="userName">{{$user}}</td>
    @endforeach
    <td colspan=2 style="text-align:center;">会社</th>
  </tr>

<!-- 飲み会代 -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">飲み会</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $expense[0] as $party)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($party) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>

<!-- タイムズ -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">タイムズ</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $expense[1] as $times)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($times) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>

<!-- 通信費 -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">通信費</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $expense[2] as $c_cost)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($c_cost) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>

<!-- atbb -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">atbb</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $expense[3] as $atbb)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($atbb) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>

<!-- atbb顧客利用 -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">atbb顧客用</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $expense[4] as $atbb_customer)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($atbb_customer) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>

<!-- 定期控除 -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">定期控除</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $expense[5] as $regular)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($regular) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>

<!-- その他控除1 -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">その他控除1</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $expense[6] as $other1)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($other1) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>

<!-- その他控除2 -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">その他控除2</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $expense[7] as $other2)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($other2) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>

<!-- その他控除3 -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">その他控除3</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $expense[8] as $other3)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($other3) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>

<!-- 合計 -->
<tr id="indivi_sum_tr" style="background-color:#FFBEDA;">
  <td style="text-align:center;white-space:nowrap;">立替経費合計</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $expense[9] as $total)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($total) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>
