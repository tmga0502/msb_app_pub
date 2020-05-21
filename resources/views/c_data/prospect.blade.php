@extends('layouts.c_data')

@section('content')

<div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper" style="margin:0">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">売上管理</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a href="{{ route('getTop') }}">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li><a href="{{ route('getCdata') }}">顧客管理TOP</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active">売上管理</a></li>
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
                            <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                            </div>
                        </div>
                    </div>
                    <!-- 検索ナビ -->
                     @include('c_data.prospectDetail.searchNav')
                    <!-- END検索ナビ -->
                    <!-- next_month -->
                    <div class="row">
                      <div class="col-md-8">
                        @include('c_data.prospectDetail.applyGet')
                      </div>
                      <div class="col-md-4">
                        @include('c_data.prospectDetail.accuracyGet')
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        @include('c_data.prospectDetail.prospectGet')
                      </div>
                      <div class="col-md-3">
                        @include('c_data.prospectDetail.applyPeplesGet')
                      </div>
                      <div class="col-md-3">
                        @include('c_data.prospectDetail.thisMonthGet')
                      </div>
                      <div class="col-md-3">
                        @include('c_data.prospectDetail.nextMonthGet')
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <!--END CONTENT-->
    </div>
<!--END PAGE WRAPPER-->


@endsection
