<!-- 合計額計算は【KAdmin-Dark/script/main.js】に記載 -->

<div class="panel panel-red" style="margin-left:15px;">
  <div class="panel-heading">今期売上目標設定
</div>
<div class="panel-body">

<div class="table-wrapper">
  <table class="table table-bordered table-striped">
  <form action="{{ route('c_data.budgets_save')}}" method="post">
  @csrf
  <input type="hidden" name="user_id" value="{{ $userDetail->id }}">
  <thead>
      <tr>
        <th class="fix" rowspan=2 colspan=2 style="vertical-align:middle;">
          <select name="period" id="selectPiriod">
            <option value=10>第10期</option>
            <option value=11>第11期</option>
            <option value=12>第12期</option>
            <option value=13>第13期</option>
          </select>
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
      </tr>
    </thead>
    <tbody>
      <!-- 必達賃貸自己案件 -->
      <tr>
        <td rowspan=5 class="fix_td1">【必達】<br>賃貸</td>
        <td class="fix_td2">①自己案件</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_rent_my[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_rent_my[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達賃貸紹介案件 -->
      <tr>
        <td class="fix_td2">②紹介案件</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_rent_int[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_rent_int[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達賃貸提携業者 -->
      <tr>
        <td class="fix_td2">③提携業者</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_rent_out[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_rent_out[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達賃貸社内紹介売上 -->
      <tr>
        <td class="fix_td2">④社内紹介売上</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_rent_salesInt[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_rent_salesInt[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達賃貸社内紹介売上 -->
      <tr>
        <td class="fix_td2">⑤社内紹介コミッション</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_rent_salesInt_com[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_rent_salesInt_com[{{$i}}]" value=""></td>
        @endfor
      </tr>

      <!-- 必達売買自己案件 -->
      <tr>
        <td rowspan=5 class="fix_td1">【必達】<br>売買</td>
        <td class="fix_td2">①自己案件</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_trade_my[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_trade_my[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達売買紹介案件 -->
      <tr>
        <td class="fix_td2">②紹介案件</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_trade_int[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_trade_int[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達売買提携業者 -->
      <tr>
        <td class="fix_td2">③提携業者</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_trade_out[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_trade_out[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達売買社内紹介売上 -->
      <tr>
        <td class="fix_td2">④社内紹介売上</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_trade_salesInt[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_trade_salesInt[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達売買社内紹介売上 -->
      <tr>
        <td class="fix_td2">⑤社内紹介コミッション</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_trade_salesInt_com[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_trade_salesInt_com[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達賃貸その他① -->
      <tr>
        <td rowspan=3 class="fix_td1">【必達】<br>その他</td>
        <td class="fix_td2"><input type="text" name="R_other1_remark" value=""></td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_other1[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_other1[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達賃貸その他② -->
      <tr>
        <td class="fix_td2"><input type="text" name="R_other2_remark" value=""></td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_other2[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_other2[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達賃貸その他③ -->
      <tr>
        <td class="fix_td2"><input type="text" name="R_other3_remark" value=""></td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_other3[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_other3[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- 必達管理売上 -->
      <tr>
        <td class="fix_td1">【必達】<br>管理</td>
        <td class="fix_td2">管理報酬</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="R_manage[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="R_manage[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <tr>
        <td colspan=15></td>
      </tr>

      <tr>
        <th class="fix" rowspan=2 colspan=2 id="S_piriod">第10期</th>
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
      </tr>


      <!-- ストレッチ賃貸自己案件 -->
      <tr>
        <td rowspan=5 class="fix_td1">【ストレッチ】<br>賃貸</td>
        <td class="fix_td2">①自己案件</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_rent_my[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_rent_my[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ賃貸紹介案件 -->
      <tr>
        <td class="fix_td2">②紹介案件</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_rent_int[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_rent_int[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ賃貸提携業者 -->
      <tr>
        <td class="fix_td2">③提携業者</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_rent_out[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_rent_out[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ賃貸社内紹介売上 -->
      <tr>
        <td class="fix_td2">④社内紹介売上</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_rent_salesInt[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_rent_salesInt[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ賃貸社内紹介売上 -->
      <tr>
        <td class="fix_td2">⑤社内紹介コミッション</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_rent_salesInt_com[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_rent_salesInt_com[{{$i}}]" value=""></td>
        @endfor
      </tr>

      <!-- ストレッチ売買自己案件 -->
      <tr>
        <td rowspan=5 class="fix_td1">【ストレッチ】<br>売買</td>
        <td class="fix_td2">①自己案件</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_trade_my[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_trade_my[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ売買紹介案件 -->
      <tr>
        <td class="fix_td2">②紹介案件</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_trade_int[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_trade_int[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ売買提携業者 -->
      <tr>
        <td class="fix_td2">③提携業者</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_trade_out[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_trade_out[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ売買社内紹介売上 -->
      <tr>
        <td class="fix_td2">④社内紹介売上</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_trade_salesInt[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_trade_salesInt[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ売買社内紹介売上 -->
      <tr>
        <td class="fix_td2">⑤社内紹介コミッション</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_trade_salesInt_com[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_trade_salesInt_com[{{$i}}]" value=""></td>
        @endfor
      </tr>

      <!-- ストレッチ賃貸その他① -->
      <tr>
        <td rowspan=3 class="fix_td1">【ストレッチ】<br>その他</td>
        <td class="fix_td2"><input type="text" name="S_other1_remark" value=""></td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_other1[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_other1[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ賃貸その他② -->
      <tr>
        <td class="fix_td2"><input type="text" name="S_other2_remark" value=""></td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_other2[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_other2[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ賃貸その他③ -->
      <tr>
        <td class="fix_td2"><input type="text" name="S_other3_remark" value=""></td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_other3[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_other3[{{$i}}]" value=""></td>
        @endfor
      </tr>
      <!-- ストレッチ管理売上 -->
      <tr>
        <td class="fix_td1">【ストレッチ】<br>管理</td>
        <td class="fix_td2">管理報酬</td>
        @for($i = 10; $i < 13; $i++)
        <td><input type="number" name="S_manage[{{$i}}]" value=""></td>
        @endfor
        @for($i = 1; $i < 10; $i++)
        <td><input type="number" name="S_manage[{{$i}}]" value=""></td>
        @endfor
      </tr>

      <tr>
        <td colspan=15></td>
      </tr>

    <tr>
      <td colspan=2 class="fix_td1">
        <button type="submit" name="update" class="btn-xs btn-red pull-center">登録</button>
      </td>
      <td colspan=11></td>
    </tr>
    </tbody>
  </form>
  </table>
</div>

</div>
</div>
