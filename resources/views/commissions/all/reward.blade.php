<!-- 報酬 -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">税引前　報酬合計額</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $rewardArray as $reward)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($reward) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>
