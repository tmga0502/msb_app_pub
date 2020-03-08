<!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <div class="clearfix"></div>

                <!-- Topページ -->
                @if (  request()->is('*top*') )
                  <li class="active"><a href="{{ route('pm.top', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">Dashboard</span></a></li>
                @else
                  <li class=""><a href="{{ route('pm.top', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">Dashboard</span></a></li>
                @endif
                <!-- END Topページ -->

                <!-- 入金チェック -->
                @if (  request()->is('*check*') )
                  <li class="active"><a href="{{ route('pm.check', ['year' => $now_year, 'month' => $now_month])}}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">入金チェック</span></a></li>
                @else
                  <li class=""><a href="{{ route('pm.check', ['year' => $now_year, 'month' => $now_month])}}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">入金チェック</span></a></li>
                @endif
                <!-- END 入金チェック -->

                <!-- 振込明細作成 -->
                @if (  request()->is('*tr_details*') )
                  <li class="active"><a href="{{ route('pm.tr_details')}}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">振込明細作成</span></a></li>
                @else
                  <li class=""><a href="{{ route('pm.tr_details')}}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">振込明細作成</span></a></li>
                @endif
                <!-- END 振込明細作成 -->

                <!-- 管理物件一覧 -->
                @if (  request()->is('*list*') )
                  <li class="active"><a href="{{ route('pm.list')}}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">管理物件一覧</span></a></li>
                @else
                  <li class=""><a href="{{ route('pm.list')}}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">管理物件一覧</span></a></li>
                @endif
                <!-- END 管理物件登録 -->

                <!-- オーナー一覧 -->
                @if (  request()->is('*ownersList*') )
                  <li class="active"><a href="{{ route('pm.ownersList')}}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">オーナー一覧</span></a></li>
                @else
                  <li class=""><a href="{{ route('pm.ownersList')}}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">オーナー一覧</span></a></li>
                @endif
                <!-- END 管理物件登録 -->

                <!-- 管理物件登録 -->
                @if (  request()->is('*create*') )
                  <li class="active"><a href="{{ route('pm.create')}}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">管理物件登録</span></a></li>
                @else
                  <li class=""><a href="{{ route('pm.create')}}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">管理物件登録</span></a></li>
                @endif
                <!-- END 管理物件登録 -->


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
