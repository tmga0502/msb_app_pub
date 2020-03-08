<!--BEGIN BACK TO TOP-->
      <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
      <!--END BACK TO TOP-->
      <!--BEGIN TOPBAR-->
      <div id="header-topbar-option-demo" class="page-header-topbar">
          <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
              <div class="navbar-header">
                  <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span><span class="icon-bar"></span>
                  <span class="icon-bar"></span></button>
                  <a id="logo" href="#" class="navbar-brand">
                  <span class="fa fa-rocket"></span><span class="logo-text">管理者用ツール</span>
                  <span style="display: none" class="logo-text-icon">µ</span></a>
              </div>
              <div class="topbar-main">
                <a id="menu-toggle" href="#" class="hidden-xs">
                <i class="fa fa-bars"></i>
                </a>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                  <li class="dropdown topbar-user">
                  <a data-hover="dropdown" href="#" class="dropdown-toggle">&nbsp;
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>&nbsp;
                  <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-user pull-right">
                  <li><a href="{{ route('c_data.profile') }}"><i class="fa fa-user"></i>プロフィール</a></li>
                  <li class="divider"></li>
                  <li><a href="{{ route('user.logout') }}"><i class="fa fa-key"></i>ログアウト</a></li>
                </ul>
                </li>
                </ul>
              </div>
          </nav>
      </div>
      <!--END TOPBAR-->
