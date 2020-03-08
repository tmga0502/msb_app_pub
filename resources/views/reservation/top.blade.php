@extends('layouts.reservation')

@section('content')

<div id="wrapper">
<!--BEGIN SIDEBAR MENU-->
@include('reservation.side_menu')
<!--END SIDEBAR MENU-->
<div id="page-wrapper">
  <div class="page-content">
      <div class="row">
        <div class="col-lg-12">
            <div class="col-md-5 col-sm-12">
                <div class="panel panel-red">
                  <!-- お知らせ -->
                    <div class="panel-heading">Topics</div>
                    <div class="panel-body">
                        <div id="context1">
                          <a href="https://docs.google.com/spreadsheets/d/1h5hoHpGi7xqxYTJHtORzcd9vAtCe_UBB9zbogKt44kg/edit?usp=sharing" target="blank">
                          <h3> 💴 第９期  17口座入金リスト💰</h3>
                          </a>
                        </div>
                        <div id="context2">
                          <a href="https://docs.google.com/spreadsheets/d/10Z7BxIlcDP178FbIGQQWIT7uu4ENMd80EoEVn86icWU/edit#gid=486033444​" target="blank">
                          <h3>💻MTG・レク飲み会出欠表🍻 </h3>
                          </a>
                        </div>
                        <div id="context3">
                          <a href="https://docs.google.com/spreadsheets/d/1aFlEIZKgi53FRf2ePEiVT4-T3bSAtlAogbigPLLUH5c/edit?usp=sharing" target="blank">
                          <h3 style="display:inline-block;">🙆管理物件一覧表🍻 </h3>
                          </a>
                          <p style="display:inline-block;color:red;">※物件確認の時に見てね！</p>
                        </div>
                        <br>
                        <div id="bccoment">
                          <img src="#" style="float:left;">
                          <p style="color:red;font-size:20px;">来客以外はスペース予約基本禁止です！！</p>
                          <span>(※会社公認のMTG除く)</span>
                        </div>
                        <div id="bc_footer">
                          <h4>業者対応はなるべく外でおねがいします☆</h4>
                        </div>
                    </div>
                </div>
                <!-- endお知らせ -->
                <!-- カレンダー -->
                <div class="panel panel-green">
                    <div class="panel-heading">カレンダー</div>
                    <div class="panel-body">
                      @include('reservation.calendar')
                    </div>
                </div>
                <!-- endカレンダー -->
            </div>
            <!-- 予定 -->
              @include('reservation.scheduleList_top')
            <!-- end予定 -->
            </div>
        </div>
      </div>
  </div>
</div>


@endsection
