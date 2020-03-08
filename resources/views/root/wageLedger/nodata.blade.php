<tr>
  <!-- 氏名 -->
  <td>{{ $datas[$i]['name'] }}</td>

  <!-- 雇用形態 -->
  <td>
    @if($datas[$i]['contract_type'] == 1)
    <input type="text" name="contract_type[{{$i}}]" class="contract_type" value="正社員" readonly>
    @elseif($datas[$i]['contract_type'] == 2)
    <input type="text" name="contract_type[{{$i}}]" class="contract_type" value="アルバイト・パート" readonly>
    @elseif($datas[$i]['contract_type'] == 3)
    <input type="text" name="contract_type[{{$i}}]" class="contract_type" value="役員" readonly>
    @endif
  </td>

  <!-- 労働日数 -->
  <td>
    <input type="number" name="workingDay" class="contract_type">
  </td>

  <!-- 労働時間 -->
  <td>
    <input type="number" name="workingTime" class="contract_type">
  </td>

  <!-- 時間外労働 -->
  <td>
    <input type="number" name="overTime" class="contract_type">
  </td>

  <!-- 休日労働 -->
  <td>
    <input type="number" name="holiday" class="contract_type">
  </td>

  <!-- 深夜労働 -->
  <td>
    <input type="number" name="nightWorking" class="contract_type">
  </td>

  <!-- 人件費総額 -->
  <td>
    <input type="text" name="laborCosts[{{$i}}]" class="laborCosts" value="">
  </td>
  <!-- 役員コミッション -->
  <td>
    <input type="text" name="executiveCommission[{{$i}}]" class="executiveCommission" value="">
  </td>
  <!-- 会社立替経費 -->
  <td class="advanceExpensesTd">
    <input type="text" name="advanceExpenses[{{$i}}]" class="advanceExpenses" value="{{ number_format( $users[$i]['advanceExpenses']) }}">
  </td>

  <!-- 事務委託 -->
  <td>
    <input type="text" name="consignment[{{$i}}]" class="consignment" value="{{ number_format( $users[$i]['consignment']) }}" readonly>
  </td>
  <!-- 社宅　会社負担 -->
  <td>
    <input type="text" name="rent[{{$i}}]" class="rent" value="{{ number_format( $users[$i]['rent']) }}" readonly>
  </td>

  <!-- 社宅　会社負担 -->
  <td>
    <input type="text" name="socialInsurance[{{$i}}]" class="socialInsurance" value="" readonly>
  </td>

  <!-- 役員報酬 -->
  <td>
    <input type="text" name="remuneration[{{$i}}]" class="remuneration" value="{{ number_format($users[$i]['remuneration']) }}" readonly>
  </td>

  <!-- 固定給 -->
  <td>
    <input type="text" name="salary[{{$i}}]" value="{{ number_format( $users[$i]['salary']) }}" readonly>
  </td>

  <!-- 賞与 -->
  <td class="bonusTd">
    <input type="text" name="bonus[{{$i}}]" value="{{ number_format( $users[$i]['bonus']) }}" readonly>
  </td>

  <!-- 歩合 -->
  <td>
    <input type="text" name="commission[{{$i}}]" value="{{ number_format( $users[$i]['commission']) }}" readonly>
  </td>

  <!-- 手当 -->
  <td>
    <input type="text" name="allowance[{{$i}}]" value="{{ number_format( $users[$i]['allowance']) }}" readonly>
  </td>
  <!-- 課税支給額 -->
  <td>
    <input type="text" name="taxableAmount[{{$i}}]" value="{{ number_format( $users[$i]['taxableAmount']) }}" readonly>
  </td>
  <!-- 課税支給額 -->
  <td>
    <input type="text" name="commutingExpenses[{{$i}}]" value="{{ number_format( $users[$i]['commutingExpenses']) }}" readonly>
  </td>
  <!-- 合計 -->
  <td>
    <input type="text" name="salarySum[{{$i}}]" value="{{ number_format( $users[$i]['salarySum']) }}" readonly>
  </td>

  <!-- 健康保険 -->
  <td>
    <input type="text" name="HealthInsurance[{{$i}}]" value="{{ number_format( $users[$i]['HealthInsurance']) }}" readonly>
  </td>

  <!-- 介護保険 -->
  <td>
    <input type="text" name="CareInsurance[{{$i}}]" value="{{ number_format( $users[$i]['CareInsurance']) }}" readonly>
  </td>

  <!-- 厚生年金 -->
  <td>
    <input type="text" name="WelfarePension[{{$i}}]" value="{{ number_format( $users[$i]['WelfarePension']) }}" readonly>
  </td>
  <td>雇用保険</td>
  <td>小計</td>
  <td>課税対象額</td>

  <!-- 所得税 -->
  <td>
    <input type="text" name="incomeTax[{{$i}}]" value="{{ number_format( $users[$i]['incomeTax']) }}">
  </td>

  <!-- 住民税 -->
  <td>
    <input type="text" name="residentTax[{{$i}}]" value="{{ number_format( $users[$i]['residentTax']) }}" readonly>
  </td>
  <td>立替経費</td>
  <td>年末調整</td>
  <td>社宅</td>
  <td>小計</td>
  <td>控除額</td>
  <td>差し引き支給額</td>
</tr>
