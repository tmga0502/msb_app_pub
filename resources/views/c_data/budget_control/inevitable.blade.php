<thead>
    <tr>
      <th class="fix" rowspan=2 colspan=2 style="vertical-align:middle;">
        第{{$budgetList['period'] }}期
      </th>
      <th colspan=3 style="text-align:center" class="R_year_fh">2019年</th>
      <th colspan=9 style="text-align:center" class="R_year_ah">2020年</th>
    </tr>
    <tr>
      <th>10月</th>
      <th>11月</th>
      <th>12月</th>
      <th>1月</th>
      <th>2月</th>
      <th>3月</th>
      <th>4月</th>
      <th>5月</th>
      <th>6月</th>
      <th>7月</th>
      <th>8月</th>
      <th>9月</th>
      <th>合計</th>
    </tr>
  </thead>
  <tbody>
    <!-- 必達賃貸自己案件 -->
    <tr>
      <td rowspan=5 class="fix_td1_budget">【必達】<br>賃貸</td>
      <td class="fix_td2_budget">①自己案件</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_rent_my'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_rent_my'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[0]) }}</td>
    </tr>
    <!-- 必達賃貸紹介案件 -->
    <tr>
      <td class="fix_td2_budget">②紹介案件</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_rent_int'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_rent_int'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[1]) }}</td>
    </tr>
    <!-- 必達賃貸提携業者 -->
    <tr>
      <td class="fix_td2_budget">③提携業者</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_rent_out'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_rent_out'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[2]) }}</td>
    </tr>
    <!-- 必達賃貸社内紹介売上 -->
    <tr>
      <td class="fix_td2_budget">④社内紹介売上</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_rent_salesInt'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_rent_salesInt'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[3]) }}</td>
    </tr>
    <!-- 必達賃貸社内紹介売上 -->
    <tr>
      <td class="fix_td2_budget">⑤社内紹介コミッション</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_rent_salesInt_com'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_rent_salesInt_com'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[4]) }}</td>
    </tr>

    <!-- 必達売買自己案件 -->
    <tr>
      <td rowspan=5 class="fix_td1_budget">【必達】<br>売買</td>
      <td class="fix_td2_budget">①自己案件</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_trade_my'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_trade_my'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[5]) }}</td>
    </tr>
    <!-- 必達売買紹介案件 -->
    <tr>
      <td class="fix_td2_budget">②紹介案件</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_trade_int'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_trade_int'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[6]) }}</td>
    </tr>
    <!-- 必達売買提携業者 -->
    <tr>
      <td class="fix_td2_budget">③提携業者</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_trade_out'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_trade_out'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[7]) }}</td>
    </tr>
    <!-- 必達売買社内紹介売上 -->
    <tr>
      <td class="fix_td2_budget">④社内紹介売上</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_trade_salesInt'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_trade_salesInt'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[8]) }}</td>
    </tr>
    <!-- 必達売買社内紹介売上 -->
    <tr>
      <td class="fix_td2_budget">⑤社内紹介コミッション</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_trade_salesInt_com'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_trade_salesInt_com'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[9]) }}</td>
    </tr>

    <!-- 必達賃貸その他① -->
    <tr>
      <td rowspan=3 class="fix_td1_budget">【必達】<br>その他</td>
      <td class="fix_td2_budget">
      {{ $budgetList['R_other1_remark'] }}
      </td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_other1'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_other1'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[10]) }}</td>
    </tr>
    <!-- 必達賃貸その他② -->
    <tr>
      <td class="fix_td2_budget">
      {{ $budgetList['R_other2_remark'] }}
      </td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_other2'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_other2'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[11]) }}</td>
    </tr>
    <!-- 必達賃貸その他③ -->
    <tr>
      <td class="fix_td2_budget">
        {{ $budgetList['R_other3_remark'] }}
      </td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_other3'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_other3'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[12]) }}</td>
    </tr>
     <!-- 必達管理売上 -->
    <tr>
      <td class="fix" colspan=2>【必達】管理売上</td>
      @for($i = 10; $i < 13; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_manage'][$i]) }}
      </td>
      @endfor
      @for($i = 1; $i < 10; $i++)
      <td class="bgRight">
        ￥{{ number_format($budgetList['R_manage'][$i]) }}
      </td>
      @endfor
      <td class="bgRight">¥{{ number_format($RyearsSum[13]) }}</td>
    </tr>

    <!-- 合計 -->
  <tr>
    <td class="fix" colspan=2 >【必達】合計
     @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ¥{{ number_format($RcontentsSum[$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ¥{{ number_format($RcontentsSum[$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($RcontentsSum[13]) }}</td>
  </tr>

    <tr>
      <td colspan=15></td>
    </tr>
