<div class="panel panel-grey">
    <div class="panel-heading">翌月着金予定</div>
    <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="text-align:center;">名前</th>
              <th style="text-align:center;">仲手</th>
              <th style="text-align:center;">AD</th>
            </tr>
          </thead>
          <tbody>
            @foreach($nextMonth as $nextMonth)
            @if($nextMonth->sales->bf_payment_schedule ==  $newYear . '-' . $newMonth . '-01' && $nextMonth->sales->ad_payment_schedule ==  $newYear . '-' . $newMonth . '-01')
            <tr>
                <td>{{ $nextMonth['customer_name'] }}</td>
                <td style="text-align:center;">￥{{ $nextMonth->sales->brokerage_fee }}</td>
                <td style="text-align:right;">￥{{ $nextMonth->sales->advertising_fee }}</td>
            </tr>
            @elseif($nextMonth->sales->bf_payment_schedule ==  $newYear . '-' . $newMonth . '-01')
            <tr>
                <td>{{ $nextMonth['customer_name'] }}</td>
                <td style="text-align:center;">￥{{ $nextMonth->sales->brokerage_fee }}</td>
                <td style="text-align:right;"></td>
            </tr>
            @elseif($nextMonth->sales->ad_payment_schedule ==  $newYear . '-' . $newMonth . '-01')
            <tr>
                <td>{{ $nextMonth['customer_name'] }}</td>
                <td style="text-align:center;"></td>
                <td style="text-align:right;">￥{{ $nextMonth->sales->advertising_fee }}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
    </div>
</div>
