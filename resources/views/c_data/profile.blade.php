@extends('layouts.c_data')

@section('content')

<div id="wrapper">
    @include('c_data.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">設定</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active"><a href="#">設定</a></li>
            </ol>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
          <!-- タブ -->
        <ul id="generalTab" class="nav nav-tabs responsive">
            <li class="active"><a href="#budgets" data-toggle="tab">予実管理表</a></li>
            <li><a href="#profile-tab" data-toggle="tab">プロフィール</a></li>
        </ul>
        <!-- endタブ -->
         <div id="generalTabContent" class="tab-content responsive">
            <div id="budgets" class="tab-pane fade in active">
                @include('c_data.profile.budgets')
            </div>

            <div id="profile-tab" class="tab-pane fade">
              @include('c_data.profile.profile')
            </div>

         </div>

        <!--END CONTENT-->
      </div>
    </div>
</div>
<!--END PAGE WRAPPER-->

@endsection
