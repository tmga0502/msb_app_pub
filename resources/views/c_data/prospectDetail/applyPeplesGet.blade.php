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
                <td>{{ $apply['c_name'] }}</td>
                <td style="text-align:right;">￥{{ number_format($apply->planBF) }}</td>
                <td style="text-align:right;">￥{{ number_format($apply->planAD) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
