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
            @foreach($thisMonth as $tm)
            @if(date('Y-m', strtotime($tm->bfSche)) ==  $year . '-' . $month && date('Y-m', strtotime($tm->adSche)) ==  $year . '-' . $month)
            <tr>
                <td>{{ $tm['c_name'] }}</td>
                <td style="text-align:right;">￥{{ number_format($tm->bf) }}</td>
                <td style="text-align:right;">￥{{ number_format($tm->ad) }}</td>
            </tr>
            @elseif(date('Y-m', strtotime($tm->bfSche)) ==  $year . '-' . $month )
            <tr>
                <td>{{ $tm['c_name'] }}</td>
                <td style="text-align:right;">￥{{ number_format($tm->bf) }}</td>
                <td style="text-align:right;"></td>
            </tr>
            @elseif(date('Y-m', strtotime($tm->adSche)) ==  $year . '-' . $month)
            <tr>
                <td>{{ $tm['c_name'] }}</td>
                <td style="text-align:right;"></td>
                <td style="text-align:right;">￥{{ number_format($tm->ad) }}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
    </div>
</div>
