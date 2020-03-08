<div class="panel panel-yellow">
    <div class="panel-heading">当月着金予定</div>
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
            @foreach($thisMonth as $thisMonth)
            @if($thisMonth->sales->bf_payment_schedule ==  $year . '-' . $month . '-01' && $thisMonth->sales->ad_payment_schedule ==  $year . '-' . $month . '-01')
            <tr>
                <td>{{ $thisMonth['customer_name'] }}</td>
                <td style="text-align:center;">￥{{ $thisMonth->sales->brokerage_fee }}</td>
                <td style="text-align:right;">￥{{ $thisMonth->sales->advertising_fee }}</td>
            </tr>
            @elseif($thisMonth->sales->bf_payment_schedule ==  $year . '-' . $month . '-01')
            <tr>
                <td>{{ $thisMonth['customer_name'] }}</td>
                <td style="text-align:center;">￥{{ $thisMonth->sales->brokerage_fee }}</td>
                <td style="text-align:right;"></td>
            </tr>
            @elseif($thisMonth->sales->ad_payment_schedule ==  $year . '-' . $month . '-01')
            <tr>
                <td>{{ $thisMonth['customer_name'] }}</td>
                <td style="text-align:center;"></td>
                <td style="text-align:right;">￥{{ $thisMonth->sales->advertising_fee }}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
    </div>
</div>
