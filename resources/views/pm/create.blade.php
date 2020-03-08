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
                管理物件登録<span style="font-size:18px;">(<span style="color:red;">※</span>は必須項目)</span>
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
                  <form action="{{ route('pm.create_new') }}" method="post" class="form-horizontal" style="margin: 50px 0px 50px 50px;">


                  <div class="form-group">
                    <div>
                    <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">物件情報</h4>
                  </div>
                    <!-- 物件名 -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>物件名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="property_name" class="form-control" value = "{{ old('property_name') }}" placeholder="物件名">
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
                    <!-- 一棟の場合のマンション名 -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>一棟の場合のマンション名
                    </label>
                    <div class="col-sm-4">
                      <select name="property_group" class="form-control">
                        @foreach($groupForm as $group)
                        @if(old('property_group')==$group)
                         <option value="{{$group}}" selected>{{$group}}</option>
                        @else
                         <option value="{{$group}}">{{$group}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                    <!-- 建物名 -->
                    <label class="col-sm-2 control-label">
                      ←「該当なし」の場合
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="new_property_group" class="form-control" value = "{{ old('new_property_group') }}" placeholder="建物名">
                    </div>
                  </div>


                  <div class="form-group">
                    <!-- 状況 -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>状況
                    </label>
                    <div class="col-sm-4">
                      <select name="status" class="form-control">
                        <option value=0>募集中</option>
                        <option value=1>居住中</option>
                      </select>
                    </div>
                    <!-- 担当 -->
                    <label class="col-sm-2 control-label">
                       <span style="color:red;">※</span>担当
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="person" class="form-control" value = "{{ old('person') }}" placeholder="担当">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- オーナー -->
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>オーナー
                    </label>
                    <div class="col-sm-4">
                      <select name="owner_name" class="form-control" onchange="owners_select(this);">
                        @foreach($ownerList as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                        <option value="新規作成">新規作成</option>
                      </select>
                    </div>
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>PMフィー
                    </label>
                    <div class="col-sm-4">
                      <input type="number" name="pm_fee" step="0.01" class="form-control" value = "{{ old('pm_fee') }}" placeholder="%">
                    </div>
                  </div>

                  <div id="owner_info" style="display:none;">
                  <div class="form-group">
                     <div>
                    <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">オーナー情報</h4>
                  </div>
                    <!-- オーナー名 -->
                    <label class="col-sm-2 control-label">
                      法人名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="corporate_name" class="form-control" value = "{{ old('corporate_name') }}" placeholder="法人の場合のみ記入">
                    </div>
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>オーナー名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="owners_name" class="form-control" value = "{{ old('owners_name') }}" placeholder="オーナー氏名">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 郵便番号 -->
                    <label class="col-sm-2 control-label">
                      郵便番号
                    </label>
                    <div class="col-sm-2">
                      <input type="number" name="first_code" class="form-control" value = "{{ old('first_code') }}">
                    </div>
                    <div class="col-sm-2">
                      <input type="number" name="last_code" class="form-control" value = "{{ old('last_code') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 住所 -->
                    <label class="col-sm-2 control-label">
                      住所
                    </label>
                    <div class="col-sm-2">
                      <input type="text" name="prefecture" class="form-control" value = "{{ old('prefecture') }}" placeholder="都道府県">
                    </div>

                    <!-- 市区町村 -->
                    <div class="col-sm-2">
                      <input type="text" name="city" class="form-control" value = "{{ old('city') }}" placeholder="市区町村">
                    </div>

                    <!-- 以降の住所 -->
                    <div class="col-sm-4">
                      <input type="text" name="address" class="form-control" value = "{{ old('address') }}" placeholder="以降の住所">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 電話番号 -->
                    <label class="col-sm-2 control-label">
                      電話番号
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="tel" class="form-control" value = "{{ old('tel') }}" placeholder="電話番号">
                    </div>

                    <!-- 携帯番号 -->
                    <label class="col-sm-2 control-label">
                      携帯番号
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="phone" class="form-control" value = "{{ old('phone') }}" placeholder="携帯番号">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 銀行名 -->
                    <label class="col-sm-2 control-label">
                      銀行名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="bank" class="form-control" value = "{{ old('bank') }}" placeholder="銀行名">
                    </div>

                    <!-- 支店名 -->
                    <label class="col-sm-2 control-label">
                      支店名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="bank_branch" class="form-control" value = "{{ old('bank_branch') }}" placeholder="支店名">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 種別 -->
                    <label class="col-sm-2 control-label">
                      種別
                    </label>
                    <div class="col-sm-1">
                      <select name="bank_type" class="form-control">
                        <option value=0 @if(old('bank_type')==0) selected  @endif>普通</option>
                        <option value=1 @if(old('bank_type')==1) selected  @endif>当座</option>
                      </select>
                    </div>

                    <!-- 口座番号 -->
                    <label class="col-sm-1 control-label">
                      口座番号
                    </label>
                    <div class="col-sm-2">
                      <input type="text" name="bank_number" class="form-control" value = "{{ old('bank_number') }}" placeholder="口座番号">
                    </div>

                    <!-- 振込名義 -->
                    <label class="col-sm-2 control-label">
                      振込名義
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="pay_name" class="form-control" value = "{{ old('pay_name') }}" placeholder="振込名義">
                    </div>
                  </div>
                </div>

                  <div class="form-group">
                    <div>
                    <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">入居者情報等</h4>
                  </div>

                  <!-- 入居者氏名 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      入居者氏名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="tenant_name" class="form-control" value = "{{ old('tenant_name') }}" placeholder="入居者氏名">
                    </div>
                  </div>

                  <!-- 契約期間 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      入居日
                    </label>
                    <div class="col-sm-4">
                      <input type="date" name="start_date" class="form-control" value = "{{ old('start_date') }}" placeholder="入居者氏名">
                    </div>
                    <label class="col-sm-2 control-label">
                      退去日
                    </label>
                    <div class="col-sm-4">
                      <input type="date" name="end_date" class="form-control" value = "{{ old('end_date') }}" placeholder="入居者氏名">
                    </div>
                  </div>

                  <!-- 賃料 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      賃料
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="rent" class="form-control" value = "{{ old('rent') }}" placeholder="賃料">
                    </div>
                    <label class="col-sm-2 control-label">
                      管理費・共益費
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="cs_fee" class="form-control" value = "{{ old('cs_fee') }}" placeholder="管理費・共益費">
                    </div>
                  </div>

                  <!-- 敷金・預り金 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      敷金・預り金
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="deposit" class="form-control" value = "{{ old('deposit') }}" placeholder="敷金・預り金">
                    </div>
                  </div>

                  <!-- 入金サイクル -->
                    <label class="col-sm-2 control-label">
                      入金サイクル
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="cycle" class="form-control" value = "{{ old('cycle') }}" placeholder="入金サイクル">
                    </div>

                    <!-- 振込日 -->
                    <label class="col-sm-2 control-label">
                      振込日
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="transfer_date" class="form-control" value = "{{ old('transfer_date') }}" placeholder="振込日">
                    </div>
                  </div>

                  <!-- 備考・振込名義 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      備考・振込名義
                    </label>
                    <div class="col-sm-10">
                      <textarea name="transfer_name" class="form-control">{{ old('transfer_name') }}</textarea>
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
    <!--END PAGE WRAPPER-->
    </div>
</div>
@endsection
