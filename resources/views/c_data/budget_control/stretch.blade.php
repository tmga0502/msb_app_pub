
  <tr>
    <th class="fix" rowspan=2 colspan=2 id="S_piriod">
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


  <!-- ストレッチ賃貸自己案件 -->
  <tr>
    <td rowspan=5 class="fix_td1_budget">【ストレッチ】<br>賃貸</td>
    <td class="fix_td2_budget">①自己案件</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_rent_my'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_rent_my'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[0]) }}</td>
  </tr>
  <!-- ストレッチ賃貸紹介案件 -->
  <tr>
    <td class="fix_td2_budget">②紹介案件</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_rent_int'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_rent_int'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[1]) }}</td>
  </tr>
  <!-- ストレッチ賃貸提携業者 -->
  <tr>
    <td class="fix_td2_budget">③提携業者</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_rent_out'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_rent_out'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[2]) }}</td>
  </tr>
  <!-- ストレッチ賃貸社内紹介売上 -->
  <tr>
    <td class="fix_td2_budget">④社内紹介売上</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_rent_salesInt'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_rent_salesInt'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[3]) }}</td>
  </tr>
  <!-- ストレッチ賃貸社内紹介売上 -->
  <tr>
    <td class="fix_td2_budget">⑤社内紹介コミッション</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_rent_salesInt_com'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_rent_salesInt_com'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[4]) }}</td>
  </tr>

  <!-- ストレッチ売買自己案件 -->
  <tr>
    <td rowspan=5 class="fix_td1_budget">【ストレッチ】<br>売買</td>
    <td class="fix_td2_budget">①自己案件</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_trade_my'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_trade_my'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[5]) }}</td>
  </tr>
  <!-- ストレッチ売買紹介案件 -->
  <tr>
    <td class="fix_td2_budget">②紹介案件</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_trade_int'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_trade_int'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[6]) }}</td>
  </tr>
  <!-- ストレッチ売買提携業者 -->
  <tr>
    <td class="fix_td2_budget">③提携業者</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_trade_out'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_trade_out'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[7]) }}</td>
  </tr>
  <!-- ストレッチ売買社内紹介売上 -->
  <tr>
    <td class="fix_td2_budget">④社内紹介売上</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_trade_salesInt'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_trade_salesInt'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[8]) }}</td>
  </tr>
  <!-- ストレッチ売買社内紹介売上 -->
  <tr>
    <td class="fix_td2_budget">⑤社内紹介コミッション</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_trade_salesInt_com'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_trade_salesInt_com'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[9]) }}</td>
  </tr>

  <!-- ストレッチ賃貸その他① -->
  <tr>
    <td rowspan=3 class="fix_td1_budget">【ストレッチ】<br>その他</td>
    <td class="fix_td2_budget">
    {{ $budgetList['S_other1_remark'] }}
    </td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_other1'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_other1'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[10]) }}</td>
  </tr>
  <!-- ストレッチ賃貸その他② -->
  <tr>
    <td class="fix_td2_budget">
    {{ $budgetList['S_other2_remark'] }}
    </td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_other2'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_other2'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[11]) }}</td>
  </tr>
  <!-- ストレッチ賃貸その他③ -->
  <tr>
    <td class="fix_td2_budget">
    {{ $budgetList['S_other3_remark'] }}
    </td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_other3'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_other3'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[12]) }}</td>
  </tr>

  <!-- ストレッチ管理売上 -->
  <tr>
    <td class="fix" colspan=2>【ストレッチ】管理売上</td>
    @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_manage'][$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ￥{{ number_format($budgetList['S_manage'][$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($SyearSum[13]) }}</td>
  </tr>

  <!-- 合計 -->
  <tr>
    <td class="fix" colspan=2 >【ストレッチ】合計
     @for($i = 10; $i < 13; $i++)
    <td class="bgRight">
      ¥{{ number_format($ScontentsSum[$i]) }}
    </td>
    @endfor
    @for($i = 1; $i < 10; $i++)
    <td class="bgRight">
      ¥{{ number_format($ScontentsSum[$i]) }}
    </td>
    @endfor
    <td class="bgRight">¥{{ number_format($ScontentsSum[13]) }}</td>
  </tr>

  <tr>
    <td colspan=15></td>
  </tr>
