@extends('layouts.pm')

@section('content')

<div id="wrapper">
    @include('pm.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">
                    管理物件一覧　<span style="font-size:12px;color:red;">※チェックを入れると今日の日付が入ります。</span>
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!-- 検索ナビ -->
            @include('pm.check.searchDate')
        <!-- END検索ナビ -->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">
                  <div class="col-lg-12">
                    <div class="row">


                        <div class="panel panel-red">
                            <div class="panel-heading">
                            {{ $now_year }}年{{ $now_month  }}月分チェック
                            </div>
                            <div class="panel-body">
                                <div class="table-wrapper">
                                <table class="table table-hover table-bordered">
                                    <form action="{{route('pm.check_update')}}" method="post" name="form1">
                                    @csrf
                                    <input type="hidden" id="year" name="year" value="{{$now_year}}">
                                    <input type="hidden" id="month" name="month"  value="{{$now_month}}">
                                    <input type="hidden" id="day" value="{{$now_day}}">
                                    <input type="hidden" id="count" value="{{count($lists)}}">
                                    @include('pm.check.table')
                                    </form>
                                </table>
                                </div>
                            </div>
                      </div>
                   </div>
                </div>
            </div>
        <!--END CONTENT-->
        </div>
    <!--END PAGE WRAPPER-->
    </div>
</div>


@endsection
