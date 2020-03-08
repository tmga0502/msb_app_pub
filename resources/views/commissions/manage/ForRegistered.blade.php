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
            <form action="{{ route('commissions.manage_create') }}" method="POST">
            <input type="hidden" name="userCount" value="{{count($userList)}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->name}}">
            <input type="hidden" name="dataCount" value="{{$dataCount}}">
             <!-- 提供サービス -->
            <input type="hidden" name="service" value="管理">
            @csrf
              <thead>
                  <tr>
                      <th>入居者</th>
                      <th>摘要</th>
                      <th>物件名</th>
                      <th style="white-space:nowrap;">提供サービス</th>
                      <th style="white-space:nowrap;">管理報酬</th>
                      <th>入金日</th>
                      <th>業務委託料</th>
                      <th>入金日</th>
                      <th style="white-space:nowrap;">外部紹介料</th>
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
              {!! $manageHtml !!}
              </tbody>
              </div>
            </form>
          </table>
        </div>
      </div>
</div>
