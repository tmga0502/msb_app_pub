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
               @if($list->corporate_name == '')
                {{$list->owner_name}}様詳細
                @else
                {{$list->corporate_name}}様詳細
                @endif
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
                  <form action="{{ route('pm.owner_update') }}" method="post" class="form-horizontal" style="margin: 50px 0px 50px 50px;">
                  <input type="hidden" name="id" value="{{ $list->id }}">

                  @if($list->corporate_name == '')
                  <div class="form-group">
                    <!-- オーナー名 -->
                    <label class="col-sm-2 control-label">
                      オーナー名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="owners_name" class="form-control" value = "{{ $list->owner_name }}" placeholder="オーナー氏名">
                    </div>
                  </div>
                  @else
                  <div class="form-group">
                    <!-- オーナー名 -->
                    <label class="col-sm-2 control-label">
                      法人名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="corporate_name" class="form-control" value = "{{ $list->corporate_name }}" placeholder="法人の場合のみ記入">
                    </div>
                    <label class="col-sm-2 control-label">
                      代表者名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="owners_name" class="form-control" value = "{{ $list->owner_name }}" placeholder="オーナー氏名">
                    </div>
                  </div>
                  @endif

                  <div class="form-group">
                    <!-- 郵便番号 -->
                    <label class="col-sm-2 control-label">
                      郵便番号
                    </label>
                    <div class="col-sm-2">
                      <input type="number" name="first_code" class="form-control" value = "{{ $list->first_code }}">
                    </div>
                    <div class="col-sm-2">
                      <input type="number" name="last_code" class="form-control" value = "{{ $list->last_code }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 住所 -->
                    <label class="col-sm-2 control-label">
                      住所
                    </label>
                    <div class="col-sm-2">
                      <input type="text" name="prefecture" class="form-control" value = "{{ $list->prefecture }}" placeholder="都道府県">
                    </div>

                    <!-- 市区町村 -->
                    <div class="col-sm-2">
                      <input type="text" name="city" class="form-control" value = "{{ $list->city }}" placeholder="市区町村">
                    </div>

                    <!-- 以降の住所 -->
                    <div class="col-sm-6">
                      <input type="text" name="address" class="form-control" value = "{{ $list->address }}" placeholder="以降の住所">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 電話番号 -->
                    <label class="col-sm-2 control-label">
                      電話番号
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="tel" class="form-control" value = "{{ $list->tel }}" placeholder="電話番号">
                    </div>

                    <!-- 携帯番号 -->
                    <label class="col-sm-2 control-label">
                      携帯番号
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="phone" class="form-control" value = "{{ $list->phone }}" placeholder="携帯番号">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 銀行名 -->
                    <label class="col-sm-2 control-label">
                      銀行名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="bank" class="form-control" value = "{{ $list->bank }}" placeholder="銀行名">
                    </div>

                    <!-- 支店名 -->
                    <label class="col-sm-2 control-label">
                      支店名
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="bank_branch" class="form-control" value = "{{ $list->bank_branch }}" placeholder="支店名">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 種別 -->
                    <label class="col-sm-2 control-label">
                      種別
                    </label>
                    <div class="col-sm-1">
                      <select name="bank_type" class="form-control">
                        @if($list->bank_type == 0)
                        <option value=0 selected>普通</option>
                        <option value=1>当座</option>
                       @else
                        <option value=0>普通</option>
                        <option value=1 selected>当座</option>
                       @endif
                      </select>
                    </div>

                    <!-- 口座番号 -->
                    <label class="col-sm-1 control-label">
                      口座番号
                    </label>
                    <div class="col-sm-2">
                      <input type="text" name="bank_number" class="form-control" value = "{{ $list->bank_number }}" placeholder="口座番号">
                    </div>

                    <!-- 振込名義 -->
                    <label class="col-sm-2 control-label">
                      振込名義
                    </label>
                    <div class="col-sm-4">
                      <input type="text" name="pay_name" class="form-control" value = "{{ $list->pay_name }}" placeholder="振込名義">
                    </div>
                  </div>


                  <div class="form-group">
                    <!-- 所有物件一覧 -->
                    <label class="col-sm-2 control-label">
                      所有物件一覧
                    </label>
                    <div class="col-sm-4">
                      <ul>
                        @foreach($list->pms as $pms)
                          <li style="font-size:18px;">{{ $pms['property_name'] }}</li>
                        @endforeach
                      </ul>
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
