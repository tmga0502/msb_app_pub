<!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <div class="clearfix"></div>

                <!-- ユーザー登録 -->
                @if (  request()->is('*signup*') )
                  <li class="active"><a href="{{ route('root.signup', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-pencil-square">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">ユーザー登録</span></a></li>
                @else
                  <li class=""><a href="{{ route('root.signup', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-pencil-square">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">ユーザー登録</span></a></li>
                @endif
                <!-- END ユーザー登録 -->

                <!-- ユーザー一覧 -->
                @if (  request()->is('*userList*') )
                  <li class="active"><a href="{{ route('root.userList', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-user fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">ユーザー一覧</span></a></li>
                @else
                  <li class=""><a href="{{ route('root.userList', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-user fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">ユーザー一覧</span></a></li>
                @endif
                <!-- END ユーザー一覧 -->


                <!-- 行間を開ける用 -->
                <li><div class="icon-bg bg-orange"></div></li>
                <!-- end行間を開ける用 -->


                <!-- TOPへ -->
                <li><a href="{{ route('manager.top') }}"><i class="fa fa-calendar fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">TOPへ</span></a>
                </li>
                <!-- END TOPへ -->

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
