<table class="table table-bordered">
  <thead>
    <tr>
        <!-- 前月へ -->
        @if($month == 1)
        <th style="text-align:center;"><a href="{{ route('reservation.create', ['year' => $year-1, 'month' => 12, 'day' => 1]) }}">&laquo;</a></th>
        @else
          <th style="text-align:center;"><a href="{{ route('reservation.create', ['year' => $year, 'month' => $month-1, 'day' => 1]) }}">&laquo;</a></th>
        @endif

        <!-- 当月表示 -->
        <th colspan=5 style="text-align:center;">{{$year}}年{{$month}}月</th>

        <!-- 翌月へ -->
        @if($month == 12)
        <th style="text-align:center;"><a href="{{ route('reservation.create', ['year' => $year+1, 'month' => 1, 'day' => 1]) }}">&raquo;</a></th>
        @else
          <th style="text-align:center;"><a href="{{ route('reservation.create', ['year' => $year, 'month' => $month+1, 'day' => 1]) }}">&raquo;</a></th>
        @endif
      </tr>
  </thead>
  <tbody>
    <tr>
    <!-- 曜日表示 -->
      @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
        @if($dayOfWeek == '日')
          <th style="text-align:center;color:red;background-color:#FFC0CB;">{{ $dayOfWeek }}</th>
        @elseif($dayOfWeek == '土')
          <th style="text-align:center;color:blue;background-color:#E6E6FA">{{ $dayOfWeek }}</th>
        @else
          <th style="text-align:center;background-color:#EEEEEE">{{ $dayOfWeek }}</th>
        @endif
      @endforeach
    </tr>
    @foreach ($dates as $date)
    @if ($date->dayOfWeek == 0)
    <tr>
    @endif

    <!-- カレンダー日時表示 -->
      <td style="text-align:center;">
        <a href="{{ route('reservation.create', ['year' => $date->year, 'month' => $date->month, 'day' => $date->day]) }}">{{ $date->day }}</a>
      </td>
    @if ($date->dayOfWeek == 6)
    </tr>
    @endif
    @endforeach
  </tbody>
</table>

<!-- 今日を表示ボタン -->
<a href="{{ route('reservation.create', ['year' => \Carbon\Carbon::now()->year, 'month' => \Carbon\Carbon::now()->month, 'day' => \Carbon\Carbon::now()->day]) }}">
  <button class="btn-secondary center-block">今日を表示</button>
</a>
