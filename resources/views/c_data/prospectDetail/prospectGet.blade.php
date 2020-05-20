<div class="panel panel-pink">
    <div class="panel-heading">当月見込客</div>
    <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="text-align:center;">名前</th>
              <th style="text-align:center;">確度</th>
              <th style="text-align:center;">売上</th>
            </tr>
          </thead>
          <tbody>
            @foreach($prospects as $prospect)
            <tr>
                <td>{{ $prospect['c_name'] }}</td>
                <td style="text-align:center;">{{ $prospect['accuracy'] }}</td>
                <td style="text-align:right;">￥{{ number_format($prospect->plannedSales) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
