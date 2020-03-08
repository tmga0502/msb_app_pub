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
                    勤怠登録
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
                                {{ $now_year }}年{{ $now_month }}月{{ $now_day }}日
                            </div>
                            <div class="panel-body">
                                <!-- 未登録なら -->
                                @if($flag == 0)
                                <table class="table table-hover table-bordered">
                                    <form method="post" action="{{ route('workTime.create') }}">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="year" value="{{ $now_year }}">
                                    <input type="hidden" name="month" value="{{ $now_month }}">
                                    <input type="hidden" name="day" value="{{ $now_day }}">
                                    <thead>
                                        <tr>
                                            <th>出社時刻</th>
                                            <th>退社時刻</th>
                                            <th>休憩</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="time" class="form-control" name="start">
                                            </td>
                                            <td>
                                                <input type="time" class="form-control" name="end">
                                            </td>
                                            <td>
                                                <input type="time" class="form-control" name="break">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan=3 class="text-center">
                                                <button type="submit" class="btn btn-primary">登録</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </div>
                                    </form>
                                </table>

                                <!-- 登録済みなら -->
                                @else
                                    <h4>既に登録済みです</h4>
                                @endif
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
