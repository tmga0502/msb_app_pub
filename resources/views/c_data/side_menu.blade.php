<!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <div class="clearfix"></div>

                <!-- Topページ -->
                @if (  Request::decodedPath() == 'c_data_top' )
                  <li class="active"><a href="{{ route('c_data.top') }}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">Dashboard</span></a></li>
                @else
                  <li class=""><a href="{{ route('c_data.top') }}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">Dashboard</span></a></li>
                @endif
                <!-- END Topページ -->

                <!-- 顧客一覧ページ -->
                @if (  Request::decodedPath() == 'customer_list' )
                <li class="active"><a href="{{ route('c_data.c_list') }}"><i class="fa fa-desktop fa-fw">
                      <div class="icon-bg bg-green"></div>
                  </i><span class="menu-title">顧客一覧</span></a>
                </li>
                @else
                <li><a href="{{ route('c_data.c_list') }}"><i class="fa fa-desktop fa-fw">
                      <div class="icon-bg bg-green"></div>
                  </i><span class="menu-title">顧客一覧</span></a>
                </li>
                @endif
                <!-- END 顧客一覧ページ -->

                <!-- 新規作成ページ -->
                @if (  Request::decodedPath() == 'c_data_create' )
                <li class="active"><a href="{{ route('c_data.create') }}"><i class="fa fa-edit fa-fw">
                      <div class="icon-bg bg-violet"></div>
                  </i><span class="menu-title">新規登録</span></a>
                </li>
                @else
                <li><a href="{{ route('c_data.create') }}"><i class="fa fa-edit fa-fw">
                      <div class="icon-bg bg-violet"></div>
                  </i><span class="menu-title">新規登録</span></a>
                </li>
                @endif
                <!-- END 新規作成ページ -->

                <!-- 見込管理ページ -->
                @if (  Request::decodedPath() == 'c_data_prospect' )
                <li class="active"><a href="{{ route('c_data.prospect', ['year' => $year, 'month' => $month] ) }}"><i class="fa fa-th-list fa-fw">
                      <div class="icon-bg bg-violet"></div>
                  </i><span class="menu-title">見込管理</span></a>
                </li>
                @else
                <li><a href="{{ route('c_data.prospect' ,['year' => $year, 'month' => $month]) }}"><i class="fa fa-th-list fa-fw">
                      <div class="icon-bg bg-violet"></div>
                  </i><span class="menu-title">見込管理</span></a>
                </li>
                @endif
                <!-- 見END 込管理ページ -->


                <!-- 紹介管理ページ -->
                <li><a href="#"><i class="fa fa-user fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">紹介管理</span></a>
                </li>
                <!-- END 紹介管理ページ -->

                <!-- 予実管理ページ -->
                @if (  Request::decodedPath() == 'budget_control' )
                <li class="active"><a href="{{ route('c_data.budget_control' ) }}"><i class="fa fa-bar-chart-o fa-fw">
                      <div class="icon-bg bg-violet"></div>
                  </i><span class="menu-title">予実管理</span></a>
                </li>
                @else
                <li><a href="{{ route('c_data.budget_control') }}"><i class="fa fa-bar-chart-o fa-fw">
                      <div class="icon-bg bg-violet"></div>
                  </i><span class="menu-title">予実管理</span></a>
                </li>
                @endif
                <!-- END 予実管理ページ -->

                <!-- 入金管理ページ --><!-- 
                <li><a href="#"><i class="fa fa-cny fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">入金管理</span></a>
                </li> -->
                <!-- END 入金管理ページ -->

                <!-- 設備予約へ -->
                <li><a href="{{ route('reservation.mypage') }}"><i class="fa fa-calendar fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">設備予約へ</span></a>
                </li>
                <!-- END 設備予約へ -->

                <!-- 業務ツールへ -->
                <li><a href="#"><i class="fa fa-database fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">業務ツールへ</span></a>
                </li>
                <!-- END 業務ツールへ -->

            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->
