<!-- 【未登録】個別売上配分表 -->

<div class="panel panel-violet">
      <div class="panel-heading">
          @if($now_month == 1)
          {{ $now_year - 1 }}年12月分
          @else
          {{ $now_year }}年{{ $now_month - 1 }}月分
          @endif
      </div>
      <div class="panel-body">

        <div class="table-wrapper">
        <!-- 行追加ボタン -->
        <!-- <button type="btn" class="btn-sm btn-green" onclick="addTableRow();">＋行を追加</button> -->
        <!-- end行追加ボタン -->
          <table class="table table-hover table-bordered" id='registrationTable'>
            <form action="{{ route('commissions.trade_create') }}" method="POST">
            <input type="hidden" name="dataCount" value="{{count($csvDatas)}}">
            <input type="hidden" name="userCount" value="{{count($userList)}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->name}}">
             <!-- 提供サービス -->
            <input type="hidden" name="service" value="売買">
            @csrf
              <thead>
                  <tr>
                      <th>買主</th>
                      <th>売主</th>
                      <!-- <th style="white-space:nowrap;">提供サービス</th> -->
                      <th>適用</th>
                      <th>物件名</th>
                      <th>号室</th>
                      <th>仲介手数料</th>
                      <th>入金日</th>
                      <th>業務委託料</th>
                      <th>入金日</th>
                      <th>外部報酬料</th>
                      <th>新or旧</th>
                      <th colspan=2 style="white-space:nowrap;">レート上限</th>
                      @foreach( $userList as $user)
                      <th colspan=4 style="text-align:center;">{{$user}}</th>
                      @endforeach
                      <th colspan=4 style="text-align:center;">会社</th>
                      <th>備考</th>
                  </tr>
              </thead>
              <tbody>
              {!! $tradeHtml !!}
              </tbody>
              </div>
            </form>
          </table>
        </div>
      </div>
</div>
