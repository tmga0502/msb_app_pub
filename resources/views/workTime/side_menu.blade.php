<!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <div class="clearfix"></div>

                <!-- Topページ -->
                @if (  request()->is('*top*') )
                  <li class="active"><a href="{{ route('workTime.top', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">勤怠登録</span></a></li>
                @else
                  <li class=""><a href="{{ route('workTime.top', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">勤怠登録</span></a></li>
                @endif
                <!-- END Topページ -->


                <!-- 勤怠一覧 -->
                @if (  request()->is('*list*') )
                  <li class="active"><a href="{{ route('workTime.list', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-list fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">勤怠一覧</span></a></li>
                @else
                  <li class=""><a href="{{ route('workTime.list', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-list fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">勤怠一覧</span></a></li>
                @endif
                <!-- END 労働時間一覧 -->


                <!-- 行間を開ける用 -->
                <li><div class="icon-bg bg-orange"></div></li>
                <!-- end行間を開ける用 -->


                <!-- 設備予約へ -->
                <li><a href="{{ route('reservation.mypage') }}"><i class="fa fa-calendar fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">設備予約へ</span></a>
                </li>
                <!-- END 設備予約へ -->

                <!-- 顧客管理へ -->
                <li><a href="{{ route('c_data.top') }}"><i class="fa fa-desktop fa-fw">
                  <div class="icon-bg bg-green"></div>
                  </i><span class="menu-title">顧客管理表へ</span></a>
                </li>
                <!-- end顧客管理へ -->

            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->
