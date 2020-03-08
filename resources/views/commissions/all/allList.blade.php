<tbody>
  @foreach( $allList as $list)
  <tr id="indivi_td_tr">
    <td>{{ $list->customer_name }}</td>
    <td>{{ $list->seller_name }}</td>
    <td>{{ $list->user_id }}</td>
    <td>{{ $list->apartment_name }}</td>
    <td>{{ $list->room }}</td>
    <td>{{ $list->company }}</td>
    <td>{{ $list->partner }}</td>
    <td name="bro_incentive">¥{{ number_format($list->brokerage_fee) }}</td>
    <td>{{  $list->b_fee_date }}</td>
    <td name="ad_incentive">¥{{ number_format($list->advertising_fee) }}</td>
    <td>{{ $list->ad_date }}</td>
    <td name="ap_incentive">￥{{ number_format($list->am_pm_fee) }}</td>
    <td>{{ $list->am_pm_fee_date }}</td>
    <td name="outsourcing_incentive">￥{{ number_format($list->outsourcing_fee) }}</td>
    <td>{{ $list->o_fee_date }}</td>
    <td name="outsource_incentive">¥{{ number_format($list->outsource) }}</td>
    @if(isset($list->csv->price))
    <td name="sales_incentive">
      ¥{{ number_format( $list->csv->price - $list->outsource) }}
    </td>
    <td name="notax_incentive">
      ¥{{ number_format( ($list->csv->price - $list->outsource) / 1.1 ) }}
    </td>
    @else
    <td name="sales_incentive">
      ¥{{ number_format( $list->am_pm_fee - $list->outsource) }}
    </td>
    <td name="notax_incentive">
      ¥{{ number_format( ($list->am_pm_fee - $list->outsource) / 1.1 ) }}
    </td>
    @endif
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
    <td  name="{{$user}}_incentive">
      ¥{{ number_format( $list->receiver_percent[$user]['price'] ) }}
    </td>
    @endforeach

    <td>{{ $list->percent_company }}％</td>
    <td name="company_incentive">
      ¥{{ number_format( $list->dividend_company ) }}
    </td>
  </tr>
  @endforeach
</tbody>
</div>
