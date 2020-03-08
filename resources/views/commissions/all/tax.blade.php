<!-- 報酬 -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">源泉額</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $tax as $tax)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($tax) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>
