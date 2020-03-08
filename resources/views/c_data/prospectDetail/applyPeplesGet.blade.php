<div class="panel panel-green">
    <div class="panel-heading">申込中</div>
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
            @foreach($applies as $apply)
            <tr>
                <td>{{ $apply['customer_name'] }}</td>
                <td style="text-align:center;">￥{{ $apply->sales->brokerage_fee }}</td>
                <td style="text-align:right;">￥{{ $apply->sales->advertising_fee }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
