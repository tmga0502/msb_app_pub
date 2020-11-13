@extends('layouts.master_auth')

@section('content')

<div id="tab-general">
    <div id="sum_box" class="row mbl">

        <div class="page-form" style="margin: 100px auto;">
            <div class="panel panel-blue">
                <div class="panel-body pan">
                    <form method="POST" action="{{ route('login.login') }}" class="form-horizontal">
                    <div class="form-body pal">
                        <div class="col-xs-12 text-center">
                            <h1 style="margin-top: -90px; font-size: 36px;">
                                ログイン</h1>
                            <br />
                        </div>

                        <!-- アイコン -->
                        <div class="form-group">
                            <div class="col-md-3 visible-md visible-lg">
                                <img src="{{ url('/') }}/KAdmin-Dark/images/avatar/profile-pic.png" class="img-responsive" style="margin-top: -35px;" />
                            </div>
                        </div>

                        <!-- ID入力フォーム -->
                        <div class="form-group">
                            <label for="inputName" class="col-xs-3 control-label">
                                UserID:</label>
                            <div class="col-xs-9">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" id="loginID" name="loginID" class="form-control" value="{{old('loginID')}}">
                                    </div>
                            </div>
                        </div>

                        <!-- password入力フォーム -->
                        <div class="form-group">
                            <label for="inputPassword" class="col-xs-3 control-label">
                                Password:</label>
                            <div class="col-xs-9">
                                <div class="input-icon right">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}">
                                    </div>
                            </div>
                        </div>

                        <!-- エラーメッセージ -->
                        @if($errors->has('password'))
                            <div class="col-md-9 text-center">
                            <p>ユーザーID, パスワードが一致しません。</p>
                            </div>
                        @endif

                        <!-- ログインボタン -->
                        <div class="form-group mbn">
                            <div class="col-xs-12" style="text-align:right;">
                                <button type="submit" name="reservation" class="btn btn-default">ログイン</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        </form>
                    </div>
                    </form>
                </div>
                <a href="{{ route('e_signup') }}">signup<a> 
            </div>
        </div>
    </div>
</div>

@endsection
