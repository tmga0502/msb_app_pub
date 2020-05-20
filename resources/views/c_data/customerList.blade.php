@extends('layouts.c_data')

@section('content')

<div id="wrapper">
    @include('c_data.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">顧客一覧</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a href="{{ route('c_data.top') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active"><a href="{{ route('c_data.c_list') }}">顧客一覧</a></li>
            </ol>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div class="row mbl">
                    <div class="col-lg-12">
                        <div class="col-md-12">
                            <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;"></div>
                        </div>
                    </div>
                    <!-- 検索ナビ -->
                    <div class="row">
                      <div class="col-lg-12">
                          <nav role="navigation" class="navbar navbar-default">
                              <div class="container-fluid">
                                  <div class="navbar-header">
                                      <a class="navbar-brand">検索</a></div>
                                  <div id="bs-example-navbar-collapse-2" class="collapse navbar-collapse">
                                      <form action="{{ route('c_data.cListSearch') }}" method="POST" role="search" class="navbar-form navbar-left">
                                        @csrf
                                        <div class="form-group">
                                        お客様名：
                                        <input type="text" class="form-control" name="cName">
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" name="searchBtn" value="cDataSearch" class="btn btn-blue">検索</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" name="searchBtn" value="cDataclear" class="btn btn-blue">クリア</button>
                                      </form>
                                  </div>
                              </div>
                          </nav>
                      </div>
                    </div>
                    <!-- END検索ナビ -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="panel panel-green">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover table-borde">
                                        <thead>
                                        <tr>
                                            <th class="col-md-2">お客様名</th>
                                            <th class="col-md-1">状況</th>
                                            <th class="col-md-1">申込予定</th>
                                            <th class="col-md-2">紹介者名</th>
                                            <th class="col-md-4">備考</th>
                                            <th class="col-md-1" style="text-align:center;">検索条件</th>
                                            <th id='del_th' style="display:none;text-align:center;">削除</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($customerList as $cl)
                                            <tr>
                                              <td>
                                                <a href="{{ route('c_data.c_detail', ['id' => $cl['id'] ]) }}" class="list_td">{{ $cl['c_name'] }}</a>
                                              </td>
                                              <td>
                                                <a href="{{ route('c_data.c_detail', ['id' => $cl['id'] ]) }}"  class="list_td">{{ $cl['statues'] }}</a>
                                              </td>
                                              <td>
                                              @if(isset($cl['plannedApply']))
                                                <a href="{{ route('c_data.c_detail', ['id' => $cl['id'] ]) }}" class="list_td">{{date('Y年m月',  strtotime($cl['plannedApply']))}}</a>
                                              @else
                                                <a href="{{ route('c_data.c_detail', ['id' => $cl['id'] ]) }}" class="list_td"></a>
                                              @endif
                                              </td>
                                              <td>
                                                <a href="{{ route('c_data.c_detail', ['id' => $cl['id'] ]) }}" class="list_td">{{ $cl['i_name'] }}</a>
                                              </td>
                                              <td>
                                                <a href="{{ route('c_data.c_detail', ['id' => $cl['id'] ]) }}" class="list_td">{{ $cl['progress'] }}</a>
                                              </td>
                                              <td>
                                                <a href="{{ route('c_data.c_detail', ['id' => $cl['id'] ]) }}">
                                                    <button type="submit" name="condition" class="btn btn-yellow btn-xs" style="width:100%;">表示or登録</button>
                                                </a>
                                              </td>
                                              <td class='del_td' style="display:none">
                                                <form action='' method='post'>
                                                @csrf
                                                <input type='hidden' value="{{ $cl['id'] }}" name='id'>
                                                <button type="submit" name="del" class="btn btn-blue btn-xs" style="width:100%;">削除</button>
                                                </form>
                                              </td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                    </table>

                                    <!-- ページネーション用link -->
                                      <div class="d-flex justify-content-center">
                                          {{ $customerList->links() }}
                                      </div>
                                    <!-- endページネーション用link -->

                                    <!-- 削除ボタン表示 -->
                                    <input type="button" style='float:right;' class="btn btn-blue btn-xs" id="delbt" value="削除ボタン表示">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!--END CONTENT-->
</div>
<!--END PAGE WRAPPER-->
</div>
</div>

<script>
  document.getElementById("delbt").onclick = function() {
    var del_th = document.getElementById("del_th");
    var del_td = document.getElementsByClassName("del_td");
    var delbt = document.getElementById("delbt");
    if (delbt.value == "削除ボタン表示"){
        del_th.style.display = "block";
        for( var $i = 0; $i < del_td.length; $i++ ) {
            del_td[$i].style.display = "block";
            del_td[$i].class="col-md-1";
        }
        delbt.value = "削除ボタン非表示";
    }else{
        del_th.style.display = "none";
        for( var $i = 0; $i < del_td.length; $i++ ) {
            del_td[$i].style.display = "none";
        }
        delbt.value = "削除ボタン表示";
    }
  };
</script>


@endsection
