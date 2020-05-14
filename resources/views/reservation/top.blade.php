@extends('layouts.reservation')

@section('content')

<div id="wrapper">
<!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                設備予約一覧
            </div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li>
              <a href="{{ route('getTop') }}">TOP</a>&nbsp;&nbsp;
              <i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li>
              <a href="{{ route('reservation.home') }}">設備予約home</a>&nbsp;&nbsp;
              <i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">設備予約一覧</li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
<!--END TITLE & BREADCRUMB PAGE-->
<!--BEGIN CONTENT-->
<div id="page-wrapper" style="margin:0;">
  <div class="page-content">
      <div class="row">
        <div class="col-lg-12">
            <div class="col-md-5 col-sm-12">
                <!-- カレンダー -->
                <div class="panel panel-green">
                    <div class="panel-heading">カレンダー</div>
                    <div class="panel-body">
                      @include('reservation.calendar')
                    </div>
                </div>
                <!-- endカレンダー -->
            </div>
            <!-- 予定 -->
              @include('reservation.scheduleList_top')
            <!-- end予定 -->
            </div>
        </div>
      </div>
  </div>
</div>


@endsection
