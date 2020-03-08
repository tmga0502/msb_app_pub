@extends('layouts.workTime')

@section('content')

<div id="wrapper">
    @include('workTime.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">
                    勤怠一覧
                </div>
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
                    <div class="row" style="margin-left:50px;margin-right:50px;">


                        <div class="panel panel-red">
                            <div class="panel-heading">
                                {{ $now_year }}年{{ $now_month }}月
                            </div>
                            <div class="panel-body">
                                
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>日付</th>
                                            <th>出社時刻</th>
                                            <th>退社時刻</th>
                                            <th>休憩</th>
                                            <th>所定内時間</th>
                                            <th>残業時間</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>

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
