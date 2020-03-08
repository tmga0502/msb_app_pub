<thead>
  <tr id="indivi_th_tr">
    <th>成約者<br>(借主・買主)</th>
    <th>成約者<br>(売主)</th>
    <th>物件名</th>
    <th>号室</th>
    <th>管理会社</th>
    <th>提携業者</th>
    <th>仲介手数料</th>
    <th>入金日</th>
    <th>広告料</th>
    <th>入金日</th>
    <th>管理報酬</th>
    <th>入金日</th>
    <th>業務委託料</th>
    <th>入金日</th>
    <th>外部報酬料</th>
    <th>売上(税込)</th>
    <th>売上(税抜)</th>
    <th>成立台帳</th>
    <th>提供サービス</th>
    <th>新or旧</th>
    <th>レート上限</th>
    @foreach( $userList as $user)
    <th colspan=2 style="text-align:center;" name="userName">{{$user}}</th>
    @endforeach
    <th colspan=2 style="text-align:center;">会社</th>
  </tr>
</thead>
