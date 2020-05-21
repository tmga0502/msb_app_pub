@extends('layouts.c_data')

@section('content')

<div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper" style="margin:0">
      <!--BEGIN TITLE & BREADCRUMB PAGE-->
      <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
          <div class="page-header pull-left">
              <div class="page-title">
                  新規登録</div>
          </div>
          <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{ route('getTop') }}">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li>&nbsp;<a href="{{ route('getCdata') }}">顧客管理TOP</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">新規登録</a></li>
          </ol>
          <div class="clearfix">
          </div>
      </div>
      <!--END TITLE & BREADCRUMB PAGE-->
      <!--BEGIN CONTENT-->
      <div class="page-content">
          <div id="tab-general">
              <div class="row mbl">
                  <div class="col-lg-12">
                      <div class="col-md-12">
                          <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 col-lg-offset-3">
                      <div class="row">
                        <div class="panel panel-orange">
                            <div class="panel-heading">
                                登録フォーム</div>
                            <div class="panel-body pan">
                              <form method="post" action="{{ route('c_create') }}">
                                @csrf
                              <div class="form-body pal">
                                  <div class="row">
                                    <!-- お客様名 -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputName" class="control-label">
                                                お客様名</label>
                                            <div class="input-icon right">
                                                <i class="fa fa-user"></i>
                                                <input id="inputName" type="text" class="form-control" name="c_name" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- かな -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputKana" class="control-label">
                                                かな</label>
                                            <div class="input-icon right">
                                              <input id="inputKana" type="text" name="c_kana" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 紹介者名 -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputIName" class="control-label">
                                                紹介者名</label>
                                            <div class="input-icon right">
                                                <i class="fa fa-user"></i>
                                                <input id="inputIName" type="text" class="form-control" name="i_name" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- かな -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputIKana" class="control-label">
                                                かな</label>
                                            <div class="input-icon right">
                                              <input id="inputIKana" type="text" name="i_kana" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 紹介者との関係性 -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputIrelation" class="control-label">
                                                紹介者との関係性</label>
                                            <div class="input-icon right">
                                              <input id="inputIrelation" type="text" name="i_relation" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <!-- 確度 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">
                                                確度</label>
                                            <div class="input-icon right">
                                              <select name="accuracy" class="form-control">
                                                @foreach($accuracy as $acc)
                                                <option value="{{ $acc }}">{{ $acc }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <!-- 案件種別 -->
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="control-label">
                                              案件種別</label>
                                          <div class="input-icon right">
                                            <select name="i_type" class="form-control">
                                              @foreach($introducer as $intro)
                                              <option value="{{ $intro }}">{{ $intro }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- 紹介種別 -->
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="control-label">
                                              紹介種別</label>
                                          <div class="input-icon right">
                                            <select name="i_who" class="form-control">
                                              @foreach($introduction_type as $iType)
                                              <option value="{{ $iType }}">{{ $iType }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- 紹介年月 -->
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputImonth" class="control-label">
                                            紹介年月</label>
                                        <div class="input-icon right">
                                            <input id="inputImonth" type="month"  class="form-control" name="i_month" />
                                        </div>
                                    </div>
                                  </div>

                                  <!-- 申込予定月 -->
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPA" class="control-label">
                                            申込予定月</label>
                                        <div class="input-icon right">
                                            <input id="inputPA" type="month"  class="form-control" name="plannedApply" />
                                        </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                  <input type="hidden" name="status" value="---">
                                <div class="form-actions text-center pal">
                                    <button type="submit" class="btn btn-primary">
                                        登録</button>
                                </div>
                              </div>
                              </form>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div><!--END CONTENT-->
    </div><!--END PAGE WRAPPER-->
</div><!--END WRAPPER-->


@endsection
