<!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <div class="clearfix"></div>

                <!-- Topページ -->
                @if (  request()->is('*top*') )
                  <li class="active"><a href="{{ route('root.top', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">Dashboard</span></a></li>
                @else
                  <li class=""><a href="{{ route('root.top', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-tachometer fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">Dashboard</span></a></li>
                @endif
                <!-- END Topページ -->


                <!-- 振込額一覧 -->
                @if (  request()->is('*transferList*') )
                  <li class="active"><a href="{{ route('root.transferList', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-list fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">振込額一覧</span></a></li>
                @else
                  <li class=""><a href="{{ route('root.transferList', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-list fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">振込額一覧</span></a></li>
                @endif
                <!-- END 振込額一覧 -->

                <!-- 経費一覧 -->
                @if (  request()->is('*expense_list*') )
                  <li class="active"><a href="{{ route('root.expense_list', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-list-alt fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">経費一覧</span></a></li>
                @else
                  <li class=""><a href="{{ route('root.expense_list', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-list-alt fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">経費一覧</span></a></li>
                @endif
                <!-- END 経費一覧 -->

                <!-- 振込額一覧 -->
                @if (  request()->is('*csv*') )
                  <li class="active"><a href="{{ route('root.csv', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-file-o fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">CSV登録</span></a></li>
                @else
                  <li class=""><a href="{{ route('root.csv', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-file-o fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">CSV登録</span></a></li>
                @endif
                <!-- END 振込額一覧 -->

                <!-- 経費登録 -->
                @if (  request()->is('*expense_create*') )
                  <li class="active"><a href="{{ route('root.expense_create', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-money fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">経費登録</span></a></li>
                @else
                  <li class=""><a href="{{ route('root.expense_create', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-money fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">経費登録</span></a></li>
                @endif
                <!-- END 経費登録 -->

                <!-- 正規雇用賃金台帳 -->
                @if (  request()->is('*wageLedger*') )
                  <li class="active"><a href="{{ route('root.wageLedger', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-money fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">正規雇用賃金台帳</span></a></li>
                @else
                  <li class=""><a href="{{ route('root.wageLedger', ['year' => $now_year, 'month' => $now_month, 'day' => $now_day]) }}"><i class="fa fa-money fa-fw">
                      <div class="icon-bg bg-orange"></div>
                  </i><span class="menu-title">正規雇用賃金台帳</span></a></li>
                @endif
                <!-- END 正規雇用賃金台帳 -->


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
