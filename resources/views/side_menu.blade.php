<!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <div class="clearfix"></div>

                <!-- 設備予約 -->
                <li><a href="{{ route('login_reserve') }}"><i class="fa fa-calendar fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">設備予約</span></a>
                </li>
                <!-- END 設備予約 -->

                <!-- 行間を開ける用 -->
                <li><div class="icon-bg bg-orange"></div></li>
                <!-- end行間を開ける用 -->

                <!-- 請求書 -->
                <li><a href="{{ route('login_commissions') }}"><i class="fa fa-file-o fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">請求書</span></a>
                </li>
                <!-- END 請求書 -->

                <!-- 行間を開ける用 -->
                <li><div class="icon-bg bg-orange"></div></li>
                <!-- end行間を開ける用 -->

                <!-- 物件管理 -->
                <li><a href="{{ route('login_pm') }}"><i class="fa fa-file-o fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">物件管理</span></a>
                </li>
                <!-- END 物件管理 -->

                <!-- 行間を開ける用 -->
                <li><div class="icon-bg bg-orange"></div></li>
                <!-- end行間を開ける用 -->

                <!-- 顧客管理表 -->
                <li><a href="{{ route('login_customer') }}"><i class="fa fa-list fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">顧客管理表</span></a>
                </li>
                <!-- END 顧客管理表 -->

                <!-- 行間を開ける用 -->
                <li><div class="icon-bg bg-orange"></div></li>
                <!-- end行間を開ける用 -->

                <!-- 管理者 -->
                <li><a href="{{ route('login_root') }}"><i class="fa fa-key fa-fw">
                      <div class="icon-bg bg-red"></div>
                  </i><span class="menu-title">管理者</span></a>
                </li>
                <!-- END 管理者 -->

            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->
