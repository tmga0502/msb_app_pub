@extends('layouts.c_data')

@section('content')

<div id="wrapper">
   @include('c_data.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">【 {{ $customerList['customer_name'] }} 】詳細</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a href="{{ route('c_data.top') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active"><a href="{{ route('c_data.c_list') }}">顧客一覧</a><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active">【 {{ $customerList['customer_name'] }} 】詳細</li>
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

                  <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="row">
                            <!-- お客様情報 -->
                              @include('c_data.customerDetail.informations')
                            <!-- endお客様情報 -->
                            <!-- 売上情報 -->
                              @include('c_data.customerDetail.sales')
                            <!-- end売上情報 -->
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="row">
                            <!-- 物件情報 -->
                            @include('c_data.customerDetail.propertyInformation')
                            <!-- end物件情報 -->
                            <!-- 審査後フロー -->
                            @include('c_data.customerDetail.flow')
                            <!-- end審査後フロー -->
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="row">
                            <!-- 詳細情報 -->
                            @include('c_data.customerDetail.details')
                            <!-- end詳細情報 -->
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


@endsection
