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
                    振込明細作成
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!-- 検索ナビ -->
        <!-- END検索ナビ -->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">
                  <div class="col-lg-12">
                    <div class="row">
                <div class="col-sm-12" style="margin: 0px auto;">
                  <form action="{{ route('pm.create_new') }}" method="post" class="form-horizontal" style="margin: 50px 0px 50px 50px;">


                  <div class="form-group">
                    <!-- 入金額 -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>入金額
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="property_name" class="form-control" value = "{{ old('property_name') }}" placeholder="入金額">
                    </div>
                    <!-- 部屋番号 -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>部屋番号
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="room_number" class="form-control" value = "{{ old('room_number') }}" placeholder="部屋番号">
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="col-sm-12" style="padding-top:20px;padding-bottom:20px;"></div>
                    <div class="col-sm-offset-4 col-sm-4">
                      <button type="submit" class="btn btn-primary btn-block">新規登録</button>
                    </div>

                  </div>
                  {{ csrf_field() }}
                  </form>
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
