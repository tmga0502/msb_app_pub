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
            @foreach($nextMonth as $nm)
            @if(date('Y-m', strtotime($nm->bfSche)) ==  $newYear . '-' . $newMonth && date('Y-m', strtotime($nm->adSche)) ==  $newYear . '-' . $newMonth)
            <tr>
                <td>{{ $nm['c_name'] }}</td>
                <td style="text-align:center;">￥{{ number_format($nm->bf) }}</td>
                <td style="text-align:right;">￥{{ number_format($nm->ad) }}</td>
            </tr>
            @elseif(date('Y-m', strtotime($nm->bfSche)) ==  $newYear . '-' . $newMonth)
            <tr>
                <td>{{ $nm['c_name'] }}</td>
                <td style="text-align:center;">￥{{ number_format($nm->bf) }}</td>
                <td style="text-align:right;"></td>
            </tr>
            @elseif(date('Y-m', strtotime($nm->adSche)) ==  $newYear . '-' . $newMonth)
            <tr>
                <td>{{ $nm['c_name'] }}</td>
                <td style="text-align:center;"></td>
                <td style="text-align:right;">￥{{ number_format($nm->ad) }}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
    </div>
</div>
