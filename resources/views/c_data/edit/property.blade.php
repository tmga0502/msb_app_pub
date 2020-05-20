@extends('layouts.c_data')

@section('content')

  <div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    @include('c_data.side_menu')
    <div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">【 {{ $cList->c_name }} 様】編集</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a href="{{ route('c_data.top') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active"><a href="{{ route('c_data.c_list') }}">顧客一覧</a><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active">【 {{ $cList->c_name }} 様】編集</li>
            </ol>
            <div class="clearfix">
            </div>
        </div>
    <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">


                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <form action="{{ route('propertyInformation_update') }}" method="post" >
                        @csrf
                            <!-- id埋込 -->
                            <input type="hidden" name="c_id" value="{{ $cList->id }}">
                            <div class="form-body pal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <!-- 物件情報 -->
                                            <div>
                                                <h4 class="col-md-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:1px solid gray;">物件情報</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- 用途 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputName" class="control-label">用途</label>
                                                    <select id="useType" name="useType" class="form-control">
                                                        <option value='---' @if($cList->statues == '---') selected  @endif>---</option>
                                                        <option value='住居' @if($cList->statues == '住居') selected  @endif>住居</option>
                                                        <option value='事務所' @if($cList->statues == '事務所') selected  @endif>事務所</option>
                                                        <option value='店舗' @if($cList->statues == '店舗') selected  @endif>店舗</option>
                                                        <option value='駐車場' @if($cList->statues == '駐車場') selected  @endif>駐車場</option>
                                                        <option value='その他' @if($cList->statues == 'その他') selected  @endif>その他</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 郵便番号 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">郵便番号</label>
                                                    <input type="text" id="zipcode" class="form-control" name="zipcode" value = "{{ $cList->zipcode }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 住所 -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">住所</label>
                                                    <input type="text" class="form-control" id="address" name="address" value = "{{ $cList->address }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 建物名 -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">建物名</label>
                                                    <input type="text" class="form-control" id="mansion_name" name="mansion_name" value = "{{ $cList->mansion_name }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 賃料 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">賃料</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="rent" value = "{{ $cList->rent }}" />
                                                        <span class="input-group-addon">円</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 契約日 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">契約日</label>
                                                    <input type="date" class="form-control" name="contractDate" value = "{{ $cList->contractDate }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 賃発日 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">賃発日</label>
                                                    <input type="date" class="form-control" name="startDate" value = "{{ $cList->startDate }}" />
                                                </div>
                                            </div>
                                            <!-- 解約日 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">解約日</label>
                                                    <input type="date" class="form-control" name="endDate" value = "{{ $cList->endDate }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 契約期間 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">契約期間</label>
                                                    <input type="text" class="form-control" name="period" value = "{{ $cList->period }}" />
                                                </div>
                                            </div>
                                            <!-- 解約予告 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">解約予告</label>
                                                    <input type="text" class="form-control" name="notice" value = "{{ $cList->notice }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 更新料種別 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">更新料種別</label>
                                                     <select name="renewalType" class="form-control">
                                                        <option value='新賃料' @if($cList->statues == '新賃料') selected  @endif>新賃料</option>
                                                        <option value='旧賃料' @if($cList->statues == '旧賃料') selected  @endif>旧賃料</option>
                                                        <option value='更新不可' @if($cList->statues == '更新不可') selected  @endif>更新不可</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- 更新料 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">更新料</label>
                                                    <input type="text" class="form-control" name="renewalFee" value = "{{ $cList->renewalFee }}" />
                                                </div>
                                            </div>
                                        </div>

                                        @if($cList->i_type == '【売買】自己案件' || $cList->i_type == '【売買】社内紹介')
                                        <div class="row">
                                            <!-- 決済日 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">決済日</label>
                                                    <input type="date" class="form-control" name="settlementDate" value = "{{ $cList->settlementDate }}" />
                                                </div>
                                            </div>
                                            <!-- 引渡日 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">引渡日</label>
                                                    <input type="date" class="form-control" name="deliveryDate" value = "{{ $cList->deliveryDate }}" />
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="row">
                                            <!-- 書類発送先 -->
                                            <div>
                                                <h4 class="col-md-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:1px solid gray;">書類発送先</h4>
                                            </div>
                                        </div>

                                        <!-- 入居者名 -->
                                        <input type="hidden" id="c_name" value="{{ $cList->c_name }}">

                                        <!-- 契約者と同じチェック -->
                                        <div class="row">
                                            <!-- 契約者と同じ -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input tabindex="5" id="sameCheck" type="checkbox" />
                                                            &nbsp; 契約者と同じ
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 宛名 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">宛名</label>
                                                    <input id="d_name" type="text" class="form-control" name="distinationName" value = "{{ $cList->distinationName }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 郵便番号 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">郵便番号</label>
                                                    <input id="d_zipcode" type="text" class="form-control" name="d_zipcode" value = "{{ $cList->d_zipcode }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 住所 -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">住所</label>
                                                    <input id="d_address" type="text" class="form-control" name="d_address" value = "{{ $cList->d_address }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 建物名 -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">建物名</label>
                                                    <input id="dm_name" type="text" class="form-control" name="d_mansion_name" value = "{{ $cList->d_mansion_name }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- その他情報 -->
                                            <div>
                                                <h4 class="col-md-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:1px solid gray;">その他情報</h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 管理会社・売主名 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        @if($cList->i_type == '【売買】自己案件' || $cList->i_type == '【売買】社内紹介')
                                                        売主名
                                                        @else
                                                        管理会社名
                                                        @endif
                                                    </label>
                                                    <input type="text" class="form-control" name="mcName" value = "{{ $cList->mcName }}" />
                                                </div>
                                            </div>
                                            <!-- 担当者名 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">担当者名</label>
                                                    <input type="text" class="form-control" name="mcPerson" value = "{{ $cList->mcPerson }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 電話 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">電話</label>
                                                    <input type="text" class="form-control" name="mcTel" value = "{{ $cList->mcTel }}" />
                                                </div>
                                            </div>
                                            <!-- FAX -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">FAX</label>
                                                    <input type="text" class="form-control" name="mcFax" value = "{{ $cList->mcFax }}" />
                                                </div>
                                            </div>
                                        </div>

                                        @if($cList->i_type == '【賃貸】自己案件' || $cList->i_type == '【賃貸】社内紹介')
                                        <div class="row">
                                            <!-- 社宅代行サービス名 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">社宅代行サービス名</label>
                                                    <input type="text" class="form-control" name="acting" value = "{{ $cList->acting }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- 社宅代行サービス担当者名 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">社宅代行サービス担当者名</label>
                                                    <input type="text" class="form-control" name="actingPerson" value = "{{ $cList->actingPerson }}" />
                                                </div>
                                            </div>
                                            <!-- 社宅代行サービス担当者かな -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">社宅代行サービス担当者かな</label>
                                                    <input type="text" class="form-control" name="actingKana" value = "{{ $cList->actingKana }}" />
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if($cList->i_type == '【売買】自己案件' || $cList->i_type == '【売買】社内紹介')
                                        <div class="row">
                                            <!-- 銀行ローン -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">銀行ローン</label>
                                                    <input type="text" class="form-control" name="loan" value = "{{ $cList->loan }}" />
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <!-- 送信ボタン -->
                            <div class=" text-center pal">
                                <button type="submit" class="btn btn-primary" name="btn" value="upload">
                                    更新</button>
                            </div>
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
