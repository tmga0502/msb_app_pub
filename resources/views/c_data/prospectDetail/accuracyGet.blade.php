<div class="panel panel-violet">
    <div class="panel-heading">【確度別】見込み売上</div>
    <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="text-align:center;">確度</th>
              <th style="text-align:center;">件数</th>
              <th style="text-align:center;">金額</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align:center;">A</td>
              <td style="text-align:right;">{{ $accuracies['A_count'] }}&nbsp;&nbsp;件</td>
              <td style="text-align:right;">{{ $accuracies['A_sum'] }}</td>
            </tr>
            <tr>
              <td style="text-align:center;">B</td>
              <td style="text-align:right;">{{ $accuracies['B_count'] }}&nbsp;&nbsp;件</td>
              <td style="text-align:right;">{{ $accuracies['B_sum'] }}</td>
            </tr>
            <tr>
              <td style="text-align:center;">C</td>
              <td style="text-align:right;">{{ $accuracies['C_count'] }}&nbsp;&nbsp;件</td>
              <td style="text-align:right;">{{ $accuracies['C_sum'] }}</td>
            </tr>
            <tr>
              <td style="text-align:center;">C</td>
              <td style="text-align:right;">{{ $accuracies['D_count'] }}&nbsp;&nbsp;件</td>
              <td style="text-align:right;">{{ $accuracies['D_sum'] }}</td>
            </tr>
            <tr>
              <td style="text-align:center;">合計</td>
              <td style="text-align:right;">{{ $accuracies['sumCount'] }}&nbsp;&nbsp;件</td>
              <td style="text-align:right;">{{ $accuracies['sumSum'] }}</td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
