<tbody>
  @foreach( $indiviListRent as $list)
  <tr id="indivi_td_tr">
    <td>{{ $list->customer_name }}</td>
    <td>{{ $list->seller_name }}</td>
    <td>{{ $list->apartment_name }}</td>
    <td>{{ $list->room }}</td>
    <td>{{ $list->company }}</td>
    <td>{{ $list->partner }}</td>
    <td name="bro_incentive">¥{{ number_format($list->brokerage_fee) }}</td>
    <td>{{ $list->b_fee_date }}</td>
    <td name="ad_incentive">¥{{ number_format($list->advertising_fee) }}</td>
    <td>{{ $list->ad_date }}</td>
    <td name="ap_incentive">￥{{ number_format($list->am_pm_fee) }}</td>
    <td>{{ $list->am_pm_fee_date }}</td>
    <td name="outsourcing_incentive">￥{{ number_format($list->outsourcing_fee) }}</td>
    <td>{{ $list->o_fee_date }}</td>
    <td name="outsource_incentive">¥{{ number_format($list->outsource) }}</td>
    <td name="sales_incentive">
      ¥{{ number_format( $list->brokerage_fee + $list->advertising_fee + $list->am_pm_fee + $list->outsourcing_fee - $list->outsource) }}
    </td>
    <td name="notax_incentive">
      ¥{{ number_format( ($list->brokerage_fee + $list->advertising_fee + $list->am_pm_fee + $list->outsourcing_fee - $list->outsource) / 1.1 ) }}
    </td>
    <td>○</td>
    <td>{{ $list->service }}</td>
    <td>
      @if($list->ledger == 0)
      新レート
      @else
      旧レート
      @endif
    </td>
    <td>{{ $list->maxRate }}％</td>

    @foreach( $userList as $user)
    <td>
      {{ $list->receiver_percent[$user]['rate'] }}％
    </td>
    <td name="{{$user}}_incentive">
      ¥{{ number_format( $list->receiver_percent[$user]['price'] ) }}
    </td>
    @endforeach

    <td>{{ $list->percent_company }}％</td>
    <td name="company_incentive">
      ¥{{ number_format( $list->dividend_company ) }}
    </td>
  </tr>
  @endforeach
  <tr id="indivi_sum_tr" style="background-color:#FFFF99;">
    <td style="text-align:center;">賃貸小計</td>
    <td colspan=5></td>
    <td id="sum_rent_bro" style="text-align:right;">¥{{ number_format($rentSum[0]) }}</td>
    <td></td>
    <td id="sum_rent_ad" style="text-align:right;">¥{{ number_format($rentSum[1]) }}</td>
    <td></td>
    <td id="sum_rent_ap" style="text-align:right;">¥{{ number_format($rentSum[2]) }}</td>
    <td></td>
    <td id="sum_rent_oi" style="text-align:right;">¥{{ number_format($rentSum[3]) }}</td>
    <td></td>
    <td id="sum_rent_out" style="text-align:right;">¥{{ number_format($rentSum[4]) }}</td>
    <td id="sum_rent_sale" style="text-align:right;">¥{{ number_format($rentSum[5]) }}</td>
    <td id="sum_rent_notax" style="text-align:right;">¥{{ number_format($rentSum[6]) }}</td>
    <td colspan=4></td>
    @foreach( $rentSum[7] as $sum)
    <td></td>
    <td style="text-align:right;">¥{{ round($sum) }}</td>
    @endforeach
    <td></td>
    <td style="text-align:right;">¥{{ number_format($rentSum[8]) }}</td>
  <tr>
</tbody>
</div>
