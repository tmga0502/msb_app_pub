@extends('layouts.commissions')

@section('content')

<div id="wrapper">
    @include('commissions.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title"> 【賃貸】入力フォーム</div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">
                  <div class="col-lg-12">
                    <div class="row">

                        <!-- 賃貸入力 -->
                        @include('commissions.rent.ForRegistered')

                    </div>
                  </div>
                </div>
            </div>
        </div><!--END CONTENT-->
    <!--END PAGE WRAPPER-->
    </div>
</div>


@endsection
