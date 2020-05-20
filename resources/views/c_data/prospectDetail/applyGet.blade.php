<div class="panel panel-red">
    <div class="panel-heading">申込状況【{{ $year }}年{{ $month }}月】</div>
    <div class="panel-body">
        <table class="table table-hover" style="table-layout: fixed; word-break: break-all; word-wrap: break-word;">
          <thead>
            <tr>
              <th class="col-lg-3"></th>
              <th class="col-lg-2" style="text-align:right;">仲手</th>
              <th class="col-lg-2" style="text-align:right;color:red;">仲手相殺</th>
              <th class="col-lg-2" style="text-align:right;">AD</th>
              <th class="col-lg-2" style="text-align:right;color:red;">AD相殺</th>
              <th class="col-lg-3" style="text-align:right;">合計</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="label label-sm label-success">申込合計</span></td>
              <td style="text-align:right;">￥{{ number_format($applications['b_fee_sum']) }}</td>
              <td style="text-align:right;color:red;font-size:x-small;">ー</td>
              <td style="text-align:right;">￥{{ number_format($applications['ad_fee_sum']) }}</td>
              <td style="text-align:right;color:red;font-size:x-small;">ー</td>
              <td style="text-align:right;">￥{{ number_format($applications['prospect_sum']) }}</td>
            </tr>
            <tr>
              <td><span class="label label-sm label-warning">当月着金</span></td>
              <td style="text-align:right;">￥{{ number_format($applications['b_fee_sum_thisMonth']) }}</td>
              <td style="text-align:right;color:red;font-size:x-small;">￥{{ number_format($applications['b_discount_sum_thisMonth']) }}</td>
              <td style="text-align:right;">￥{{ number_format($applications['ad_fee_sum_thisMonth']) }}</td>
              <td style="text-align:right;color:red;font-size:x-small;">￥{{ number_format($applications['ad_discount_sum_thisMonth']) }}</td>
              <td style="text-align:right;">￥{{ number_format($applications['prospect_sum_thisMonth']) }}</td>
            </tr>
            <tr>
              <td><span class="label label-sm label-default">翌月着金</span></td>
              <td style="text-align:right;">￥{{ number_format($applications['b_fee_sum_nextMonth']) }}</td>
              <td style="text-align:right;color:red;font-size:x-small;">￥{{ number_format($applications['b_discount_sum_nextMonth']) }}</td>
              <td style="text-align:right;">￥{{ number_format($applications['ad_fee_sum_nextMonth']) }}</td>
              <td style="text-align:right;color:red;font-size:x-small;">￥{{ number_format($applications['ad_discount_sum_nextMonth']) }}</td>
              <td style="text-align:right;">￥{{ number_format($applications['prospect_sum_nextMonth']) }}</td>
            </tr>
          </tbody>
        </table>
        <br><br><br><br>
    </div>
</div>
