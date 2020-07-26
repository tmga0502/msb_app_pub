@extends('layouts.master_auth')

@section('content')

  <div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                エージェント新規登録　<span style="font-size:18px;">(<span style="color:red;">※</span>は必須項目)</span>
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
                  <form action="{{ route('e_new') }}" method="post" class="form-horizontal" style="margin: 50px 0px 50px 50px;">
                  <!-- 名前 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="InputName">
                      <span style="color:red;">※</span>氏名
                    </label>
                    <div class="col-sm-6">
                      <input type="text" name="name" class="form-control" id="InputName" value = "{{ old('name') }}" placeholder="氏名">
                    </div>
                  </div>

                  <!-- ID -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="InputID">
                      <span style="color:red;">※</span>ID
                    </label>
                    <div class="col-sm-6">
                      <input type="text" name="loginID" class="form-control" id="InputID" value = "{{ old('loginID') }}" placeholder="結家アドレスの＠以前">
                  </div>
                  </div>

                  <!-- パスワード -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="InputPassword">
                      <span style="color:red;">※</span>パスワード
                    </label>
                    <div class="col-sm-6">
                      <input type="password" name="password" class="form-control" id="InputPassword" placeholder="パスワード" value="{{old('password')}}">
                      @if($errors->has('password'))
                      <span class="error">{{ $errors->first('passwprd') }}</span>
                      @endif
                    </div>
                  </div>

                  <!-- パスワード【再確認】 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>パスワード【確認用】
                    </label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="CheckPassword" placeholder="パスワード【確認用】" value="{{old('password')}}">

                      <span id="checkError" style="color:red;"></span>
                    </div>
                  </div>

                  <!-- 雇用形態 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      <span style="color:red;">※</span>雇用形態
                    </label>
                    <div class="col-sm-6">
                      <select name="contract_type" class="form-control">
                        <option value=0 @if(old('contract_type')==0) selected  @endif>業務委託</option>
                        <option value=1 @if(old('contract_type')==1) selected  @endif>正社員</option>
                        <option value=2 @if(old('contract_type')==2) selected  @endif>アルバイト・パート</option>
                        <option value=3 @if(old('contract_type')==3) selected  @endif>役員</option>
                        <option value=4 @if(old('contract_type')==4) selected  @endif>その他</option>
                      </select>
                    </div>
                  </div>

                  <!-- 雇用形態2 -->
                  <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                <span style="color:red;">※</span>雇用形態2</label>
                            <div class="input-icon right">
                              <select name="contract_type2" class="form-control">
                                <option value=5 @if(old('contract_type')==5) selected  @endif>なし</option>
                                <option value=0 @if(old('contract_type')==0)  @endif>業務委託</option>
                                <option value=1 @if(old('contract_type')==1) selected  @endif>正社員</option>
                                <option value=2 @if(old('contract_type')==2) selected  @endif>アルバイト・パート</option>
                                <option value=3 @if(old('contract_type')==3) selected  @endif>役員</option>
                                <option value=4 @if(old('contract_type')==4) selected  @endif>その他</option>
                              </select>
                            </div>
                        </div>
                    </div>



                  <!-- 銀行関連 -->
                  <div>
                    <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">銀行情報</h4>
                  </div>
                  <div class="form-group">
                    <!-- 銀行名 -->
                    <label class="col-sm-1 control-label">銀行名</label>
                    <div class="col-sm-2">
                      <input type="text" name="bank" class="form-control"  value = "{{ old('bank') }}"placeholder="銀行名">
                    </div>

                    <!-- 支店名 -->
                    <label class="col-sm-1 control-label">支店名</label>
                    <div class="col-sm-2">
                      <input type="text" name="bank_branch" class="form-control"  value = "{{ old('bank_branch') }}"placeholder="支店名">
                    </div>

                    <!-- 口座種別 -->
                    <label class="col-sm-1 control-label">口座種別</label>
                    <div class="col-sm-2">
                      <select name="bank_type" class="form-control">
                        <option value=0 @if(old('bank_type')==0) selected  @endif>普通</option>
                        <option value=1 @if(old('bank_type')==1) selected  @endif>当座</option>
                      </select>
                    </div>

                    <!-- 口座番号 -->
                    <label class="col-sm-1 control-label">口座番号</label>
                    <div class="col-sm-2">
                      <input type="text" name="bank_number" class="form-control" value = "{{ old('bank_number') }}" placeholder="口座番号">
                    </div>
                  </div>

                  <!-- 連絡先 -->
                  <div>
                    <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">連絡先</h4>
                  </div>
                  <div class="form-group">
                    <!-- 電話番号 -->
                    <label class="col-sm-1 control-label">電話番号</label>
                    <div class="col-sm-2">
                      <input type="text" name="tel" class="form-control" value = "{{ old('tel') }}" placeholder="電話番号">
                    </div>

                    <!-- LineID -->
                    <label class="col-sm-1 control-label">LineID</label>
                    <div class="col-sm-2">
                      <input type="text" name="lineID" class="form-control" value = "{{ old('lineID') }}" placeholder="LineID">
                    </div>

                    <!-- 結家アドレス -->
                    <label class="col-sm-1 control-label">結家アドレス</label>
                    <div class="col-sm-2">
                      <input type="text" name="msby_mail" class="form-control" value = "{{ old('msby_mail') }}" placeholder="結家アドレス">
                    </div>

                    <!-- 転送用アドレス -->
                    <label class="col-sm-1 control-label">転送用アドレス</label>
                    <div class="col-sm-2">
                      <input type="text" name="original_mail" class="form-control" value = "{{ old('original_mail') }}" placeholder="転送用アドレス">
                    </div>
                  </div>


                  <!-- 住所 -->
                  <div>
                    <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">住所</h4>
                  </div>
                  <div class="form-group">
                    <!-- 現住所 -->
                    <label class="col-sm-1 control-label">現住所</label>
                    <div class="col-sm-5">
                      <input type="text" name="address" class="form-control" value = "{{ old('address') }}" placeholder="現住所">
                    </div>

                    <!-- 住民票の住所 -->
                    <label class="col-sm-1 control-label">住民票の住所</label>
                    <div class="col-sm-5">
                      <input type="text" name="resident_card" class="form-control" value = "{{ old('resident_card') }}" placeholder="住民票の住所">
                    </div>
                  </div>



                  <!-- 緊急連絡先 -->
                  <div>
                    <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">緊急連絡先</h4>
                  </div>
                  <div class="form-group">
                    <!-- 緊急連絡者 -->
                    <label class="col-sm-1 control-label">緊急連絡者</label>
                    <div class="col-sm-2">
                      <input type="text" name="emergency_name" class="form-control" value = "{{ old('emergency_name') }}" placeholder="緊急連絡者">
                    </div>

                    <!-- 続柄 -->
                    <label class="col-sm-1 control-label">続柄</label>
                    <div class="col-sm-2">
                      <input type="text" name="relationship" class="form-control" value = "{{ old('relationship') }}" placeholder="続柄">
                    </div>

                    <!-- 緊急連絡先 -->
                    <label class="col-sm-1 control-label">緊急連絡先</label>
                    <div class="col-sm-2">
                      <input type="text" name="emergency" class="form-control" value = "{{ old('emergency') }}" placeholder="緊急連絡先">
                    </div>
                  </div>
                  <div class="form-group">
                    <!-- 緊連住所 -->
                    <label class="col-sm-1 control-label">緊連住所</label>
                    <div class="col-sm-5">
                      <input type="text" name="emergency_address" class="form-control" value = "{{ old('emergency_address') }}" placeholder="緊連住所">
                    </div>
                  </div>



                  <!-- その他情報 -->
                  <div>
                    <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">その他情報</h4>
                  </div>
                  <div class="form-group">
                    <!-- 誕生日 -->
                    <label class="col-sm-1 control-label">誕生日</label>
                    <div class="col-sm-2">
                      <input type="date" name="birthday" class="form-control" value = "{{ old('birthday') }}" placeholder="誕生日">
                    </div>

                    <!-- 入社日 -->
                    <label class="col-sm-1 control-label">入社日</label>
                    <div class="col-sm-2">
                      <input type="date" name="hire" class="form-control" value = "{{ old('hire') }}" placeholder="入社日">
                    </div>

                    <!-- 業法帖入社日 -->
                    <label class="col-sm-1 control-label">業法上入社日</label>
                    <div class="col-sm-2">
                      <input type="date" name="legal_hire" class="form-control" value = "{{ old('legal_hire') }}" placeholder="業法上入社日">
                    </div>

                    <!-- 従業員番号 -->
                    <label class="col-sm-1 control-label">従業員番号</label>
                    <div class="col-sm-2">
                      <input type="text" name="employee_number" class="form-control" value = "{{ old('employee_number') }}" placeholder="従業員番号">
                    </div>
                  </div>
                  <!-- ウイルスソフト -->
                  <div class="form-group">
                    <label class="col-sm-1 control-label">ウイルスソフト</label>
                    <div class="col-sm-5">
                      <input type="text" name="virus_soft" class="form-control" value = "{{ old('virus_soft') }}" placeholder="ウイルスソフト">
                    </div>
                  </div>

                  <!-- 資格 -->
                  <div class="form-group">
                    <label class="col-sm-1 control-label">資格</label>
                    <div>
                      <textarea class="col-sm-11"  name="licence">{{ old('licence') }}</textarea>
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
