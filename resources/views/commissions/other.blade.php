@extends('layouts.commissions')

@section('content')

<div id="wrapper">
    @include('commissions.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title"> 【現金受領・紹介料】入力</div>
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
                        @include('commissions.other.ForRegistered')

                    </div>
                  </div>
                </div>
            </div>
        </div><!--END CONTENT-->
    <!--END PAGE WRAPPER-->
    </div>
</div>


@endsection
