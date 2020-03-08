@extends('layouts.c_data')

@section('content')

<div id="wrapper">
    @include('c_data.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">予実管理</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active"><a href="#">予実管理</a></li>
            </ol>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            @if($budgetList == null)
              <p>プロフィールから今期の予算を設定してください</p>
            @else
              <div class="panel panel-red" style="margin-left:15px;">
                <div class="panel-heading">
                    第{{$budgetList['period'] }}期　予実管理
                </div>
                <div class="panel-body">
                <div class="table-wrapper">
                <table class="table table-bordered table-striped table-sm" id="budgetTable">
                    <form action="{{ route('c_data.budgets_save')}}" method="post">
                    @csrf

                    <!-- 必達予算 -->
                     @include('c_data.budget_control.inevitable')
                     <!-- ストレッチ予算 -->
                     @include('c_data.budget_control.stretch')
                     <!-- 実績 -->
                     @include('c_data.budget_control.performance')

                </tbody>
                 </form>
                </table>
                </div>

                </div>
              </div>
            @endif
        </div>
    </div>
    <!--END CONTENT-->
<!--END PAGE WRAPPER-->

@endsection
