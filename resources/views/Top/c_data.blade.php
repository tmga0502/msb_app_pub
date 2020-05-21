@extends('layouts.selectTools')

@section('content')

  <div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper" style="margin:0">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                顧客管理</span>
            </div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{ route('getTop') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">顧客管理</li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">

              <div class="row row-eq-height">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/list.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('c_data.c_list') }}"></a>
                                <h5 class="text-center text-info">一覧</h5>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/new.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('c_data.create') }}"></a>
                                <h5 class="text-center text-info">新規登録</h5>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="row row-eq-height">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/money.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('c_data.prospect') }}"></a>
                                <h5 class="text-center text-info">売上見込</h5>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/zyouken.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="#"></a>
                                <h5 class="text-center text-info">物件条件</h5>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="row row-eq-height">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/introducer.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('c_data.introduction') }}"></a>
                                <h5 class="text-center text-info">紹介者管理</h5>
                            </div>
                        </div>
                    </div>
                </div>
              </div>


            </div>
        </div>
        <!--END CONTENT-->
    <!--END PAGE WRAPPER-->
    </div>
</div>
@endsection
