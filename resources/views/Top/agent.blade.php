@extends('layouts.selectTools')

@section('content')

<div id="tab-general">
    <div id="sum_box" class="row mbl">

        <div class="page-form" style="margin: 100px auto;">
            <div class="panel panel-blue">
                <div class="panel-body pan">

                    <div class="form-body pal">
                        <div class="col-xs-12 text-center">
                            <h1 style="margin-top: -90px; font-size: 36px;">
                                Tool選択　forエージェント</h1>
                            <br />
                        </div>

                        <!-- 設備予約 -->
                        <a href="{{ route('reservation.top',['year' => $year, 'month' => $month, 'day' => $day]) }}">
                            <button type="button" class="btn btn-primary btn-lg" style="width:100%;">設備予約</button>
                            <br><br>
                        </a>

                        <!-- 顧客管理 -->
                        <a href="{{ route('c_data.top') }}">
                        <button type="button" class="btn btn-success btn-lg" style="width:100%;" disabled>顧客管理(準備中)</button>
                        <br><br>
                        </a>

                        <!-- コミッション請求書 -->
                        <a href="{{ route('commissions.com_top',['year' => $year, 'month' => $month, 'day' => $day]) }}">
                        <button type="button" class="btn btn-danger btn-lg" style="width:100%;">コミッション請求書(準備中)</button>
                        <br><br>
                        </a>

                        <!-- 管理物件 -->
                        <a href="{{ route('pm.top',['year' => $year, 'month' => $month, 'day' => $day]) }}">
                        <button type="button" class="btn btn-warning btn-lg" style="width:100%;" disabled>管理物件ツール(準備中)</button>
                        <br><br>
                        </a>

                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

@endsection
