@extends('layouts.master_auth')

@section('content')
  <div class="row">
  <div class="col-sm-6" style="margin: 0px auto;">
    <form action="{{ route('user.signup') }}" method="post" class="form-horizontal" style="margin: 50px 0px 50px 50px;">
    <div class="form-group">
      <label class="col-sm-3 control-label" for="InputName">氏名</label>
      <div class="col-sm-9">
        <input type="text" name="name" class="form-control" id="InputName" placeholder="氏名">
      </div><!--/.col-sm-10--->
    </div><!--/form-group-->

  <div class="form-group">
  <label class="col-sm-3 control-label" for="InputID">ID</label>
  <div class="col-sm-9">
  <input type="text" name="loginID" class="form-control" id="InputID" placeholder="ID">
  </div>
  <!--/form-group--></div>

  <div class="form-group">
  <label class="col-sm-3 control-label" for="InputPassword">パスワード</label>
  <div class="col-sm-9">
  <input type="password" name="password" class="form-control" id="InputPassword" placeholder="パスワード" value="{{old('password')}}">
  @if($errors->has('password'))
  <span class="error">{{ $errors->first('passwprd') }}</span>
  @endif
  </div>
  <!--/form-group--></div>

  <div class="form-group">
  <div class="col-sm-offset-3 col-sm-9">
  <button type="submit" class="btn btn-primary btn-block">新規登録</button>
  </div>
  <!--/form-group--></div>
  {{ csrf_field() }}
  </form>
  </div>
  </div>
@endsection
