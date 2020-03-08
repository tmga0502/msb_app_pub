<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            <div class="clearfix"></div>
            <li><a href="{{ route('reservation.top', ['year' => $year, 'month' => $month, 'day' => $day]) }}"><i class="fa fa-th-list fa-fw">
                  <div class="icon-bg bg-blue"></div>
              </i><span class="menu-title">TOP</span></a>
            </li>
            <li><a href="{{ route('reservation.create', ['year' => $year, 'month' => $month, 'day' => $day]) }}"><i class="fa fa-pencil fa-fw">
                  <div class="icon-bg bg-blue"></div>
              </i><span class="menu-title">新規登録</span></a>
            </li>
            <li><a href="{{ route('reservation.mypage') }}"><i class="fa fa-book fa-fw">
                  <div class="icon-bg bg-green"></div>
              </i><span class="menu-title">マイページ</span></a>
            </li>
            <!-- 業務ツールへ -->
            <li><a href="#"><i class="fa fa-database fa-fw">
                    <div class="icon-bg bg-red"></div>
                </i><span class="menu-title">業務ツールへ</span></a>
            </li>
            <!-- END 業務ツールへ -->
            <li><a href="{{ route('c_data.top') }}"><i class="fa fa-desktop fa-fw">
                  <div class="icon-bg bg-green"></div>
              </i><span class="menu-title">顧客管理表へ</span></a>
            </li>
        </ul>
    </div>
</nav>
