<!-- 立替経費合計 -->
<div class="row">
<div class="col-lg-12">
      <div class="panel panel-grey">
          <div class="panel-heading">
              @if($now_month == 1)
              {{ $now_year - 1 }}年分【通信費】一覧
              @else
              {{ $now_year }}年分【通信費】一覧
              @endif
          </div>
          <div class="panel-body">
              <table class="table table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>名前</th>
                          <th>1月</th>
                          <th>2月</th>
                          <th>3月</th>
                          <th>4月</th>
                          <th>5月</th>
                          <th>6月</th>
                          <th>7月</th>
                          <th>8月</th>
                          <th>9月</th>
                          <th>10月</th>
                          <th>11月</th>
                          <th>12月</th>
                          <th>合計</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($c_costArray as $key1 => $value1)
                      <tr>
                          <td style="text-align:center;">{{ $key1 }}</td>
                        @foreach($value1 as $key2 => $vlue2)
                          <td style="text-align:right;">{{ number_format($vlue2) }}</td>
                        @endforeach
                      </tr>
                      @endforeach
                      <tr>
                        <td>合計</td>
                          @foreach($c_costSumArray as $csum)
                          <td style="text-align:right;">{{ number_format($csum) }}</td>
                          @endforeach
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
</div>
</div>
