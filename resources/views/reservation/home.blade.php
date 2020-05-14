@extends('layouts.reservation')

@section('content')

<div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper" style="margin:0">
      <!--BEGIN TITLE & BREADCRUMB PAGE-->
      <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
          <div class="page-header pull-left">
            <div class="page-title">
                設備予約TOP</span>
            </div>
        </div>
          <ol class="breadcrumb page-breadcrumb pull-right">
              <li>
                <a href="{{ route('getTop') }}">TOP</a>&nbsp;&nbsp;
                <i class="fa fa-angle-right"></i>&nbsp;&nbsp;
              </li>
              <li class="active">設備予約TOP</li>
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
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/list.png" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('reservation.top', ['year' => $year, 'month' => $month, 'day' => $day]) }}"></a>
                                <h5 class="text-center text-info">予約状況一覧</h5>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/new.png" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('reservation.create', ['year' => $year, 'month' => $month, 'day' => $day]) }}"></a>
                                <h5 class="text-center text-info">新規作成</h5>
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
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/mypage.png" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('reservation.mypage') }}"></a>
                                <h5 class="text-center text-info">マイページ</h5>
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
