@extends('layouts.reservation')

@section('content')

<div id="wrapper">
<!--BEGIN SIDEBAR MENU-->
@include('reservation.side_menu')
<!--END SIDEBAR MENU-->
<div id="page-wrapper">
  <div class="page-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="col-md-7 col-sm-12">
            <div class="row ">
            <!-- 予約状況 -->
              @include('reservation.scheduleList_create')
            <!-- end予約状況 -->
              </div>
          </div>
          <div class="col-md-5 col-sm-12">
          <!-- 新規登録 -->
            <div class="panel panel-grey">
                <div class="panel-heading">新規登録</div>
                <div class="panel-body">
                  <form action="{{ route('r_create') }}" method="POST">
                     @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" style="white-space: nowrap">
                          設備：
                        </label>
                        <div class="col-sm-3">
                          <select name='space_name'>
                            <option value="Aスペース">Aスペース</option>
                            <option value="Bスペース">Bスペース</option>
                            <option value="Cスペース">Cスペース</option>
                            <option value="印鑑">印鑑</option>
                          </select>
                        </div>
                        <label class="col-sm-2 col-form-label">
                          用途：
                        </label>
                        <div class="col-sm-3">
                          <select name="purpose">
                            <option value="ヒアリング">ヒアリング</option>
                            <option value="契約">契約</option>
                            <option value="鍵渡し">鍵渡し</option>
                            <option value="業者対応">業者対応</option>
                            <option value="MTG">MTG</option>
                            <option value="決済">決済</option>
                          </select>
                        </div>
                      </div>
                      <!-- 詳細 -->
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                          詳細
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="description">
                        </div>
                      </div>
                      <!-- 日付 -->
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                          日付：
                        </label>
                        <div class="col-sm-8">
                        <select name="create_year">
                        @for ($i = 0; $i < 10; $i++)
                          @if (2019 + $i == $year)
                            <option value="{{ 2019 + $i }}" selected>{{ 2019 + $i }}</option>
                          @else
                            <option value="{{ 2019 + $i }}">{{ 2019 + $i }}</option>
                          @endif
                        @endfor
                        </select>
                        年
                        <select name="create_month">
                        @for ($i = 1; $i < 13; $i++)
                          @if ($i == $month)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                          @else
                            <option value="{{ $i }}">{{ $i }}</option>
                          @endif
                        @endfor
                        </select>
                        月
                        <select name="create_day">
                        @for ($i = 1; $i < 32; $i++)
                          @if ($i == $day)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                          @else
                            <option value="{{ $i }}">{{ $i }}</option>
                          @endif
                        @endfor
                        </select>
                        日
                        </div>
                      </div>
                      <!-- end日付 -->

                      <!-- 開始時間 -->
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                          開始：
                        </label>
                        <div class="col-sm-8">
                          <select name="start_hour">
                            @for ($i = 7; $i < 24; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                          時
                          <select name="start_minutes">
                            @for ($i = 0; $i < 46; $i = $i+15)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                          分
                        </div>

                      </div>
                      <!-- 終了時間 -->
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                          終了：
                        </label>
                        <div class="col-sm-8">
                          <select name="end_hour">
                            @for ($i = 7; $i < 24; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                          時
                          <select name="end_minutes">
                            @for ($i = 0; $i < 46; $i = $i+15)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                          分
                        </div>
                      </div>

                      <!-- 省略 -->

                      <!-- エラー表示 -->
                      @if($errors->any())
                          <div style="color:red;">
                              【エラー】<br><br>
                              @foreach ($errors->all() as $error)
                                  {{ $error }}<br>
                              @endforeach
                          </div>
                          <br>
                      @endif
                  <button type="submit" class="btn btn-primary btn-block">登録</button>
              </form>
                </div>
            </div>
            <div class="panel panel-green">
                <div class="panel-heading">カレンダー</div>
                <div class="panel-body">
                   @include('reservation.calendar_create')
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
</div>


@endsection
