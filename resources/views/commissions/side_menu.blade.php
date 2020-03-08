<!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <div class="clearfix"></div>

                <!-- Topページ(まとめ配分表) -->
                @if (  request()->is('*com_top*') )
                  <li class="active"><a href="{{ route('commissions.com_top', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-list fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">売上配分表</span></a></li>
                @else
                  <li class=""><a href="{{ route('commissions.com_top', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-list fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">売上配分表</span></a></li>
                @endif
                <!-- END Topページ(まとめ配分表) -->

                <!-- 個別配分まとめ -->
                @if (  request()->is('*individuals*') )
                  <li class="active"><a href="{{ route('commissions.individuals', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-list fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">個人まとめ</span></a></li>
                @else
                  <li class=""><a href="{{ route('commissions.individuals', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-list fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">個人まとめ</span></a></li>
                @endif
                <!-- END 個別配分まとめ -->

                <!-- 17口座チェック -->
                @if (  request()->is('*17check*') )
                  <li class="active"><a href="{{ route('commissions.com_csv17', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-check-square-o fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">17チェック</span></a></li>
                @else
                  <li class=""><a href="{{ route('commissions.com_csv17', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-check-square-o fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">17チェック</span></a></li>
                @endif
                <!-- END 17口座チェック -->

                <!-- 19口座チェック -->
                @if (  request()->is('*19check*') )
                  <li class="active"><a href="{{ route('commissions.com_csv19', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-check-square-o fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">19チェック</span></a></li>
                @else
                  <li class=""><a href="{{ route('commissions.com_csv19', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-check-square-o fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">19チェック</span></a></li>
                @endif
                <!-- END 19口座チェック -->

                <!-- 【賃貸】個別配分表 -->
                @if (  request()->is('*rent*') )
                  <li class="active"><a href="{{ route('commissions.rent', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-pencil fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">賃貸入力</span></a></li>
                @else
                  <li class=""><a href="{{ route('commissions.rent', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-pencil fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">賃貸入力</span></a></li>
                @endif
                <!-- END 【賃貸】個別配分表 -->

                <!-- 【売買】個別配分表 -->
                @if (  request()->is('*trade*') )
                  <li class="active"><a href="{{ route('commissions.trade', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-pencil fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">売買入力</span></a></li>
                @else
                  <li class=""><a href="{{ route('commissions.trade', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-pencil fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">売買入力</span></a></li>
                @endif
                <!-- END 【売買】個別配分表 -->

                <!-- 【管理】個別配分表 -->
                @if (  request()->is('*manage*') )
                  <li class="active"><a href="{{ route('commissions.manage', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-pencil fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">管理入力</span></a></li>
                @else
                  <li class=""><a href="{{ route('commissions.manage', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-pencil fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">管理入力</span></a></li>
                @endif
                <!-- END 【管理】個別配分表 -->

                <!-- 【現金・紹介料】個別配分表 -->
                @if (  request()->is('*other*') )
                  <li class="active"><a href="{{ route('commissions.other', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-pencil fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">現金受領・紹介料</span></a></li>
                @else
                  <li class=""><a href="{{ route('commissions.other', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-pencil fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">現金受領・紹介料</span></a></li>
                @endif
                <!-- END 【その他】個別配分表 -->

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
