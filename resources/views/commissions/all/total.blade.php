
<tr id="indivi_sum_tr" style="background-color:#FFBEDA;">
  <td style="text-align:center;">合計</td>
  <td colspan=6></td>
  <td id="sum_other_bro" style="text-align:right;">¥{{ number_format($totalSum[0]) }}</td>
  <td></td>
  <td id="sum_other_ad" style="text-align:right;">¥{{ number_format($totalSum[1]) }}</td>
  <td></td>
  <td id="sum_other_ap" style="text-align:right;">¥{{ number_format($totalSum[2]) }}</td>
  <td></td>
  <td id="sum_other_oi" style="text-align:right;">¥{{ number_format($totalSum[3]) }}</td>
  <td></td>
  <td id="sum_other_out" style="text-align:right;">¥{{ number_format($totalSum[4]) }}</td>
  <td id="sum_other_sale" style="text-align:right;">¥{{ number_format($totalSum[5]) }}</td>
  <td id="sum_other_notax" style="text-align:right;">¥{{ number_format($totalSum[6]) }}</td>
  <td colspan=4></td>
  @foreach( $totalSum[7] as $sum)
  <td></td>
  <td style="text-align:right;">¥{{ number_format(intval($sum)) }}</td>
  @endforeach
  <td></td>
  <td style="text-align:right;">¥{{ number_format($totalSum[8]) }}</td>
<tr>
