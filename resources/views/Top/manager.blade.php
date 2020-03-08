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
                                Tool選択　for管理者</h1>
                            <br />
                        </div>

                        <!-- 設備予約 -->
                        <a href="{{ route('reservation.top',['year' => $year, 'month' => $month, 'day' => $day]) }}">
                            <button type="button" class="btn btn-primary btn-lg" style="width:100%;">設備予約</button>
                            <br><br>
                        </a>

                        <!-- 報酬管理 -->
                        <a href="{{ route('root.top',['year' => $year, 'month' => $month, 'day' => $day]) }}">
                        <button type="button" class="btn btn-danger btn-lg" style="width:100%;">報酬管理</button>
                        <br><br>
                        </a>

                        <!-- 管理物件 -->
                        <a href="{{ route('pm.top',['year' => $year, 'month' => $month, 'day' => $day]) }}">
                        <button type="button" class="btn btn-warning btn-lg" style="width:100%;">管理物件ツール</button>
                        <br><br>
                        </a>

                        <!-- 顧客管理 -->
                        <a href="{{ route('c_data.top') }}">
                        <button type="button" class="btn btn-success btn-lg" style="width:100%;">顧客管理</button>
                        <br><br>
                        </a>

                        <!-- 社員一覧 -->
                        <a href="{{ route('root.userList',['year' => $year, 'month' => $month, 'day' => $day]) }}">
                        <button type="button" class="btn btn-dark btn-lg" style="width:100%;">社員一覧</button>
                        <br><br>
                        </a>

                        <!-- 社員登録 -->
                        <a href="{{ route('root.signup',['year' => $year, 'month' => $month, 'day' => $day]) }}">
                        <button type="button" class="btn btn-dark btn-lg" style="width:100%;">社員登録</button>
                        </a>

                    </div>
                </div>
            </div>


        </div>



        <div class="page-form" style="margin: 100px auto;">
            <div class="panel panel-blue">
                <div class="panel-body pan">
                    <div class="form-body pal">
                        <div class="col-xs-12 text-center">
                            <h1 style="margin-top: -90px; font-size: 36px;">
                                デバック用</h1>
                            <br />
                        </div>

                        <!-- コミッション請求書 -->
                        <a href="{{ route('commissions.com_top',['year' => $year, 'month' => $month, 'day' => $day]) }}">
                        <button type="button" class="btn btn-danger btn-lg" style="width:100%;">コミッション請求書</button>
                        <br><br>
                        </a>

                        <!-- 経費登録 -->
                        <a href="#">
                        <button type="button" class="btn btn-dark btn-lg" style="width:100%;">経費登録</button>
                        <br><br>
                        </a>

                        <!-- 労働時間管理 -->
                        <a href="{{ route('workTime.top',['year' => $year, 'month' => $month, 'day' => $day]) }}">
                        <button type="button" class="btn btn-dark btn-lg" style="width:100%;">労働時間管理</button>
                        <br><br>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    
@endsection
