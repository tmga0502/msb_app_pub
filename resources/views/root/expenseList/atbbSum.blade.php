<!-- ATBB一覧 -->
<div class="row">
<div class="col-lg-12">
      <div class="panel panel-red">
          <div class="panel-heading">
              @if($now_month == 1)
              {{ $now_year - 1 }}年分【ATBB】一覧
              @else
              {{ $now_year }}年分【ATBB】一覧
              @endif
          </div>
          <div class="panel-body">
              <table class="table table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>名前</th>
                          <th>細目</th>
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
                      @foreach($atbbArray as $key1 => $value1)
                      <tr>
                          <td rowspan=3 style="text-align:center;border-bottom:double;">{{ $key1 }}</td>
                        @foreach($value1 as $key2 => $value2)
                          @if($key2 === 0)
                                <td>ATBB</td>
                            @foreach($value2 as $key3 => $value3)
                                <td style="text-align:right;">{{ number_format($value3) }}</td>
                            @endforeach
                          @elseif($key2 == 1)
                            <tr>
                            <td>ATBB顧客</td>
                            @foreach($value2 as $key3 => $value3)
                                <td style="text-align:right;">{{ number_format($value3) }}</td>
                            @endforeach
                            </tr>
                          @else
                            <tr>
                            <td style="border-bottom:double;background-color:yellow;">小計</td>
                            @foreach($value2 as $key3 => $value3)
                                <td style="text-align:right;border-bottom:double;background-color:yellow;">{{ number_format($value3) }}</td>
                            @endforeach
                            </tr>
                          @endif
                        @endforeach
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan=2>合計</td>
                          @foreach($atbbSumArray as $asum)
                          <td style="text-align:right;">{{ number_format($asum) }}</td>
                          @endforeach
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
</div>
</div>
