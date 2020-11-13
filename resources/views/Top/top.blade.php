@extends('layouts.selectTools')

@section('content')

  <div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper" style="margin:0">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                TOPページ</span>
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">


              <div class="row row-eq-height">
                <div class="col-md-11 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-3 col-md-offset- ">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/calendar.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('reservation.home') }}"></a>
                                <h5 class="text-center text-info"><br>設備予約</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1" >
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/commission.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                @if (Auth::user()->superUser == 1)
                                <a href="{{ route('commissions.com_top',['year' => $year, 'month' => $month, 'day' => $day]) }}"></a>
                                <h5 class="text-center text-info"><br>コミッション請求書作成</h5>
                                @else
                                <a href="#"></a>
                                <h5 class="text-center text-info">【利用不可】<br><s>コミッション請求書作成</s></h5>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/customer.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                @if (Auth::user()->superUser == 1)
                                <a href="{{ route('getCdata') }}"></a>
                                <h5 class="text-center text-info"><br>顧客管理</h5>
                                @else
                                <a href="#"></a>
                                <h5 class="text-center text-info">【利用不可】<br><s>顧客管理</s></h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="row row-eq-height" @if (Auth::user()->superUser == 0) hidden @endif>
                <div class="col-md-11 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/keihi.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="#"></a>
                                <h5 class="text-center text-info">経費登録</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/clock.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('workTime.top',['year' => $year, 'month' => $month, 'day' => $day]) }}"></a>
                                <h5 class="text-center text-info">勤怠管理</h5>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="row row-eq-height"  @if (Auth::user()->superUser == 0) hidden @endif>
                <div class="col-md-11 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/money.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('root.top',['year' => $year, 'month' => $month, 'day' => $day]) }}"></a>
                                <h5 class="text-center text-info">報酬管理</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/setting.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="#"></a>
                                <h5 class="text-center text-info">設定</h5>
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
<!-- <a href="{{ route('root.signup') }}">新規登録</a> -->
@endsection
