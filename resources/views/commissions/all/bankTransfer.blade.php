<!-- 報酬 -->
<tr id="indivi_sum_tr">
  <td style="text-align:center;white-space:nowrap;">振込金額(税引き後)</td>
  <td colspan=21 style="text-align:right;"></td>
  @foreach( $btArray as $bt)
  <td></td>
  <td style="text-align:right;">¥{{ number_format($bt) }}</td>
  @endforeach
  <td colspan=2></td>
<tr>
