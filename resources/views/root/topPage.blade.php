@extends('layouts.selectTools')

@section('content')

  <div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper" style="margin:0">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                振込管理</span>
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
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/bank.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('reservation.home') }}"></a>
                                <h5 class="text-center text-info"><br>振込一覧</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1" >
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/list.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="#"></a>
                                <h5 class="text-center text-info"><br>経費一覧</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/ledger.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="{{ route('getCdata') }}"></a>
                                <h5 class="text-center text-info"><br>正規雇用賃金台帳</h5>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="row row-eq-height">
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
                                <a href="#"></a>
                                <h5 class="text-center text-info">口座CSV登録</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <div class="panel panel-info linkbox" style="padding-top:25px;padding-bottom:25px;">
                                <img class="center-block" src="{{ url('/') }}/KAdmin-Dark/images/icons/clock.svg" width="30%" height="30%" style="margin-bottom:20px;">
                                <a href="#"></a>
                                <h5 class="text-center text-info">各種集計</h5>
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
