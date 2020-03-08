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
                {{ $list->property_name }}　{{ $list->room_number}}号室詳細
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">


              <div class="row">
                <div class="col-sm-12" style="margin: 0px auto;">
                  <form action="{{ route('pm.update') }}" method="post" class="form-horizontal" style="margin: 50px 0px 50px 50px;">
                  <input type="hidden" name="id" value="{{ $list->id }}">


                  <div class="form-group">
                    <!-- 物件名 -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>物件名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="property_name" class="form-control" value = "{{ $list->property_name }}" placeholder="物件名">
                    </div>
                    <!-- 部屋番号 -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>部屋番号
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="room_number" class="form-control" value = "{{ $list->room_number }}" placeholder="部屋番号">
                    </div>
                  </div>


                  <div class="form-group">
                    <!-- 状況 -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>状況
                    </label>
                    <div class="col-sm-4">
                      <select name="status" class="form-control">
                        @if($list->status == 0)
                        <option value=0 selected>募集中</option>
                        <option value=1>居住中</option>
                        @else
                        <option value=0>募集中</option>
                        <option value=1 selected>居住中</option>
                        @endif
                      </select>
                    </div>
                    <!-- 一棟の場合のマンション名 -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>一棟の場合のマンション名
                    </label>
                    <div class="col-sm-4">
                      <select name="property_group" class="form-control">
                        @foreach($groupForm as $group)
                        @if($list->property_group==$group)
                         <option value="{{$group}}" selected>{{$group}}</option>
                        @else
                         <option value="{{$group}}">{{$group}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>


                   <div class="form-group">
                    <!-- オーナー -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>オーナー
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="owner_name" class="form-control" value = "{{ $list->owner_name }}" placeholder="オーナー氏名">
                    </div>
                    <label class="col-sm-2 control-label">
                      PMフィー
                    </label>
                    <div class="col-sm-4">
                      <input type="number" step="0.01" name="pm_fee" class="form-control" value = "{{ $list->pm_fee }}" placeholder="%">
                    </div>
                  </div>



                  <!-- 入居者氏名 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      入居者氏名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="tenant_name" class="form-control" value = "{{ $list->tenant_name }}" placeholder="入居者氏名">
                    </div>
                  </div>

                  <!-- 契約期間 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      入居日
                    </label>
                    <div class="col-sm-4">
                      <input type="date" name="start_date" class="form-control" value = "{{ $list->start_date }}" placeholder="入居者氏名">
                    </div>
                    <label class="col-sm-2 control-label">
                      退去日
                    </label>
                    <div class="col-sm-4">
                      <input type="date" name="end_date" class="form-control" value = "{{ $list->end_date }}" placeholder="入居者氏名">
                    </div>
                  </div>

                  <!-- 賃料 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      賃料
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="rent" class="form-control" value = "{{ $list->rent }}" placeholder="賃料">
                    </div>
                    <label class="col-sm-2 control-label">
                      管理費・共益費
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="cs_fee" class="form-control" value = "{{ $list->cs_fee }}" placeholder="管理費・共益費">
                    </div>
                  </div>

                  <!-- 敷金・預り金 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      敷金・預り金
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="deposit" class="form-control" value = "{{ $list->deposit }}" placeholder="敷金・預り金">
                    </div>
                  </div>

                  <!-- 担当 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      担当
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="person" class="form-control" value = "{{ $list->person }}" placeholder="担当">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 入金サイクル -->
                    <label class="col-sm-2 control-label">
                      入金サイクル
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="cycle" class="form-control" value = "{{ $list->cycle }}" placeholder="入金サイクル">
                    </div>

                    <!-- 振込日 -->
                    <label class="col-sm-2 control-label">
                      振込日
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="transfer_date" class="form-control" value = "{{ $list->transfer_date }}" placeholder="振込日">
                    </div>
                  </div>

                  <!-- 備考・振込名義 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      備考・振込名義
                    </label>
                    <div class="col-sm-10">
                      <textarea name="transfer_name" class="form-control">{{ $list->transfer_name }}</textarea>
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="col-sm-12" style="padding-top:20px;padding-bottom:20px;"></div>
                    <div class="col-sm-offset-4 col-sm-4">
                      <button type="submit" class="btn btn-primary btn-block">更新</button>
                    </div>

                  </div>
                  {{ csrf_field() }}
                  </form>
                </div>
              </div>


            </div>
        </div>
        <!--END CONTENT-->
    <!--END PAGE WRAPPER-->
    </div>
</div>
@endsection
