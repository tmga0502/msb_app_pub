<div class="col-lg-6">
    <div class="panel panel-grey">
        <div class="panel-heading">
           @if($now_month == 1)
            {{ $now_year - 1 }}年12月分売上
            @else
            {{ $now_year }}年{{ $now_month - 1 }}月分売上
            @endif
        </div>
        <div class="panel-body">
          <br><br>
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>賃貸売上</td>
                  <td style="text-align: right;">{{ number_format($rentSum[5]) }}円</td>
                </tr>
                <tr>
                  <td>売買売上</td>
                  <td style="text-align: right;">
                    {{ number_format($buySum[5]) }}円
                  </td>
                </tr>
                <tr>
                  <td>管理売上</td>
                  <td style="text-align: right;">
                    {{ number_format($manageSum[5]) }}円
                  </td>
                </tr>
                <tr>
                  <td>その他売上</td>
                  <td style="text-align: right;">
                    {{ number_format($otherSum[5]) }}円
                  </td>
                </tr>
                <tr>
                  <td>合計</td>
                  <td style="text-align: right;">
                    {{ number_format($totalSum[5]) }}円
                  </td>
                </tr>
                <tr>
                  <td>立替経費</td>
                  <td style="text-align: right;">円</td>
                </tr>
                <tr>
                  <td>税引前報酬額合計</td>
                  <td style="text-align: right;">円</td>
                </tr>
                <tr>
                  <td>源泉徴収税額</td>
                  <td style="text-align: right;">円</td>
                </tr>
                <tr>
                  <td>振込金額</td>
                  <td style="text-align: right;">円</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>