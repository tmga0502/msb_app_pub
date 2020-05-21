@extends('layouts.c_data')

@section('content')

  <div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper" style="margin:0">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">【基本情報/紹介者】編集</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a href="{{ route('getTop') }}">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li><a href="{{ route('getCdata') }}">顧客管理TOP</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active"><a href="{{ route('c_data.c_list') }}">顧客一覧</a><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active"><a href="{{ route('c_data.c_detail', ['id'=>  $cList->id]) }}">【 {{ $cList->c_name }} 様】詳細</a><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active">【基本情報/紹介者】編集</li>
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

                        <form action="{{ route('c_info_update') }}" method="post" >
                        @csrf
                            <!-- id埋込 -->
                            <input type="hidden" name="c_id" value="{{ $cList->id }}">
                            <div class="form-body pal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <!-- 基本情報 -->
                                            <div>
                                                <h4 class="col-md-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:1px solid gray;">基本情報</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- 名前 -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputName" class="control-label">名前</label>
                                                    <input id="inputName" type="text" class="form-control" name="c_name" value = "{{ $cList->c_name }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- ふりがな -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputKana" class="control-label">ふりがな</label>
                                                    <input id="inputKana" type="text" class="form-control" name="c_kana" value = "{{ $cList->c_kana }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 案件種別 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">案件種別</label>
                                                    <select name="i_type" class="form-control">
                                                        @foreach($introducer as $intro)
                                                        <option value='{{$intro}}' @if($cList->i_type == $intro) selected  @endif>{{$intro}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- 紹介種別 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">案件種別</label>
                                                    <select name="i_who" class="form-control">
                                                        @foreach($introduction_type as $intType)
                                                        <option value='{{$intType}}' @if($cList->i_who == $intType) selected  @endif>{{$intType}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 携帯 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputPhone" class="control-label">携帯</label>
                                                    <input id="inputPhone" type="text" class="form-control singleOnly" name="phone" value = "{{ $cList->phone }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- LINE -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputLine" class="control-label">LINE</label>
                                                    <input id="inputLine" type="text" class="form-control singleOnly" name="line" value = "{{ $cList->line }}" />
                                                </div>
                                            </div>

                                            <!-- メール -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputMail" class="control-label">メール</label>
                                                    <input id="inputMail" type="text" class="form-control singleOnly" name="mail" value = "{{ $cList->mail }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Facebook -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputFB" class="control-label">Facebook</label>
                                                    <input id="inputFB" type="text" class="form-control singleOnly" name="fb" value = "{{ $cList->fb }}" />
                                                </div>
                                            </div>

                                            <!-- Messenger -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputMesse" class="control-label">Messenger</label>
                                                    <input id="inputMesse" type="text" class="form-control singleOnly" name="messe" value = "{{ $cList->messe }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 誕生日 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputBirth" class="control-label">誕生日</label>
                                                    <input id="inputBirth" type="date" class="form-control" name="birthday" value = "{{ $cList->birthday }}" />
                                                </div>
                                            </div>

                                            <!-- 構成 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputStru" class="control-label">構成</label>
                                                    <input id="inputStru" type="text" class="form-control" name="structure" value = "{{ $cList->structure }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 職業 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputJob" class="control-label">職業</label>
                                                    <input id="inputJob" type="text" class="form-control" name="job" value = "{{ $cList->job }}" />
                                                </div>
                                            </div>
                                            <!-- 会社名 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputCompany" class="control-label">会社名</label>
                                                    <input id="inputCompany" type="text" class="form-control" name="company_name" value = "{{ $cList->company_name }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 実際の入居者 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputAR" class="control-label">実際の入居者</label>
                                                    <input id="inputAR" type="text" class="form-control" name="actualResident" value = "{{ $cList->actualResident }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 実際に連絡を取っていた方 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputCont" class="control-label">実際に連絡を取っていた方</label>
                                                    <input id="inputCont" type="text" class="form-control" name="contacter" value = "{{ $cList->contacter }}" />
                                                </div>
                                            </div>

                                            <!-- 契約者との関係 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputCR" class="control-label">契約者との関係</label>
                                                    <input id="inputCR" type="text" class="form-control" name="contacter_relation" value = "{{ $cList->contacter_relation }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 備考 -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputRemark" class="control-label">備考</label>
                                                    <input id="inputRemark" type="text" class="form-control" name="remark" value = "{{ $cList->remark }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 紹介者 -->
                                            <div>
                                                <h4 class="col-md-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:1px solid gray;">紹介者</h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 紹介者名 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputName" class="control-label">紹介者名</label>
                                                    <input id="inputName" type="text" class="form-control" name="i_name" value = "{{ $cList->i_name }}" />
                                                </div>
                                            </div>
                                            <!-- ふりがな -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputKana" class="control-label">ふりがな</label>
                                                    <input id="inputKana" type="text" class="form-control" name="i_kana" value = "{{ $cList->i_kana }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- 関係性 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputName" class="control-label">関係性</label>
                                                    <input id="inputName" type="text" class="form-control" name="i_relation" value = "{{ $cList->i_relation }}" />
                                                </div>
                                            </div>
                                            <!-- 紹介月 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputBirth" class="control-label">紹介月</label>
                                                    <input id="inputBirth" type="date" class="form-control" name="i_month" value = "{{ $cList->i_month }}" />
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
