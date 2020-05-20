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

                        <form action="{{ route('sales_update') }}" method="post" >
                        @csrf
                            <!-- id埋込 -->
                            <input type="hidden" name="c_id" value="{{ $cList->id }}">
                            <div class="form-body pal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <!-- 進捗状況 -->
                                            <div>
                                                <h4 class="col-md-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:1px solid gray;">進捗状況</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- 状況 -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputName" class="control-label">状況</label>
                                                    <select id="statues" name="statues" class="form-control">
                                                        <option value='---' @if($cList->statues == '---') selected  @endif>---</option>
                                                        <option value='申込' @if($cList->statues == '申込') selected  @endif>申込</option>
                                                        <option value='審査通過' @if($cList->statues == '審査通過') selected  @endif>審査通過</option>
                                                        <option value='契約締結(完了)' @if($cList->statues == '契約締結(完了)') selected  @endif>契約締結(完了)</option>
                                                        <option value='その他' @if($cList->statues == 'その他') selected  @endif>その他</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 確度 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputKana" class="control-label">確度</label>
                                                    <select name="accuracy" class="form-control">
                                                        <option value='A' @if($cList->accuracy == 'A') selected  @endif>A</option>
                                                        <option value='B' @if($cList->accuracy == 'B') selected  @endif>B</option>
                                                        <option value='C' @if($cList->accuracy == 'C') selected  @endif>C</option>
                                                        <option value='D' @if($cList->accuracy == 'D') selected  @endif>D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- 申込予定月 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">申込予定月</label>
                                                    <input type="month" class="form-control" name="plannedApply" value = "{{ date('Y-m',  strtotime($cList->plannedApply)) }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 進捗詳細 -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">進捗詳細</label>
                                                    <textarea name="progress" class="form-control">{{ $cList->progress }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 売上情報 -->
                                            <div>
                                                <h4 class="col-md-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:1px solid gray;" id="salesTitle">売上情報</h4>
                                            </div>
                                        </div>

                                        <div class="row" id="ps" style="display:none">
                                            <!-- 予定売上 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">予定売上</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="plannedSales" value = "{{ $cList->plannedSales }}" />
                                                        <span class="input-group-addon">円</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 着金予定 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">着金予定</label>
                                                    <input type="month" class="form-control" name="expectedPayment" value = "{{ date('Y-m',  strtotime($cList->expectedPayment)) }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="pbfSche" style="display:none">
                                            <!-- 予定仲手 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">仲介手数料（予定）</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="planBF" value = "{{ $cList->planBF }}" />
                                                        <span class="input-group-addon">円</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 予定仲手入金日 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">仲手入金予定</label>
                                                    <input type="month" class="form-control" name="bfSche" value = "{{ date('Y-m',  strtotime($cList->bfSche)) }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="padSche" style="display:none">
                                            <!-- 予定AD -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">AD（予定）</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="planAD" value = "{{ $cList->planAD }}" />
                                                        <span class="input-group-addon">円</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- AD入金日予定 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">AD入金予定</label>
                                                    <input type="month" class="form-control" name="adSche" value = "{{ date('Y-m',  strtotime($cList->adSche)) }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="pbf" style="display:none">
                                            <!-- 仲介手数料 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">仲介手数料</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="bf" value = "{{ $cList->bf }}" />
                                                        <span class="input-group-addon">円</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 仲手入金日 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">仲手入金日</label>
                                                    <input type="date" class="form-control" name="bfDate" value = "{{ $cList->bfDate }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="pad" style="display:none">
                                            <!-- AD -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">AD</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ad" value = "{{ $cList->ad }}" />
                                                        <span class="input-group-addon">円</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- AD入金日 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">AD入金日</label>
                                                    <input type="date" class="form-control" name="adDate" value = "{{ $cList->adDate }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="pos" style="display:none">
                                            <!-- 業務委託料 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">業務委託料</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="outsource" value = "{{ $cList->outsource }}" />
                                                        <span class="input-group-addon">円</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 業務委託料入金日 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">業務委託料入金日</label>
                                                    <input type="date" class="form-control" name="osDate" value = "{{ $cList->osDate }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="dis" style="display:none">
                                            <!-- 仲手相殺 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">仲手相殺</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="disBF" value = "{{ $cList->disBF }}" />
                                                        <span class="input-group-addon">円</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- AD相殺 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">AD相殺</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="disAD" value = "{{ $cList->disAD }}" />
                                                        <span class="input-group-addon">円</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 外部紹介料 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">外部紹介料</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="introFee" value = "{{ $cList->introFee }}" />
                                                        <span class="input-group-addon">円</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
