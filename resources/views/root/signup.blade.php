@extends('layouts.root')

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


              <form action="{{ route('root.signup_new') }}" method="post" class="form-horizontal" style="margin: 50px 0px 50px 50px;">

              <div class="col-sm-12" style="margin: 0px auto;">
                <div class="col-sm-6">
                  <div class="row">
                    <!-- 基本情報 -->
                    <div>
                      <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:1px solid gray;">基本情報</h4>
                    </div>
                    <!-- 名前 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputName" class="control-label">
                                <span style="color:red;">※</span>名前</label>
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" type="text" class="form-control" name="name" value = "{{ old('name') }}" />
                            </div>
                        </div>
                    </div>
                    <!-- ID -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputID" class="control-label">
                                <span style="color:red;">※</span>ID</label>
                            <div class="input-icon right">
                                <input id="inputID" type="text" class="form-control singleOnly" name="loginID" value = "{{ old('loginID') }}" />
                            </div>
                        </div>
                    </div>

                    <!-- パスワード -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputPass" class="control-label">
                                <span style="color:red;">※</span>パスワード</label>
                            <div class="input-icon right">
                                <input id="inputPass" type="password" class="form-control singleOnly" name="password" value = "{{ old('password') }}" />
                            </div>
                        </div>
                    </div>

                    <!-- パスワード【確認用】 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="CheckPassword" class="control-label">
                                <span style="color:red;">※</span>パスワード【確認用】</label>
                            <div class="input-icon right">
                                <input id="CheckPassword" type="text" class="form-control singleOnly" value = "{{ old('password') }}" />
                            </div>
                        </div>
                    </div>

                    <!-- 雇用形態 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                <span style="color:red;">※</span>雇用形態</label>
                            <div class="input-icon right">
                              <select name="contract_type" class="form-control">
                                <option value=0 @if(old('contract_type')==0) selected  @endif>業務委託</option>
                                <option value=1 @if(old('contract_type')==1) selected  @endif>正社員</option>
                                <option value=2 @if(old('contract_type')==2) selected  @endif>アルバイト・パート</option>
                                <option value=3 @if(old('contract_type')==3) selected  @endif>役員</option>
                                <option value=4 @if(old('contract_type')==4) selected  @endif>その他</option>
                              </select>
                            </div>
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
                                <option value=0 @if(old('contract_type')==0) selected  @endif>業務委託</option>
                                <option value=1 @if(old('contract_type')==1) selected  @endif>正社員</option>
                                <option value=2 @if(old('contract_type')==2) selected  @endif>アルバイト・パート</option>
                                <option value=3 @if(old('contract_type')==3) selected  @endif>役員</option>
                                <option value=4 @if(old('contract_type')==4) selected  @endif>その他</option>
                              </select>
                            </div>
                        </div>
                    </div>
                    <!-- 管理者権限 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                <span style="color:red;">※</span>管理者権限</label>
                            <div class="input-icon right">
                              <select name="superUser" class="form-control">
                                <option value=0 @if(old('superUser')==0) selected  @endif>なし</option>
                                <option value=1 @if(old('superUser')==1) selected  @endif>あり</option>
                              </select>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="col-sm-6">
                  <div class="row">
                    <!-- 連絡先 -->
                    <div>
                      <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:1px solid gray;">連絡先</h4>
                    </div>
                    <!-- 電話番号 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputTel" class="control-label">
                                電話番号</label>
                            <div class="input-icon right">
                                <input id="inputTel" type="text" name="tel" class="form-control singleOnly" value = "{{ old('tel') }}" />
                            </div>
                        </div>
                    </div>

                    <!-- LINE ID -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputLine" class="control-label">
                                LINE ID</label>
                            <div class="input-icon right">
                                <input id="inputLine" type="text" name="lineID" class="form-control singleOnly" value = "{{ old('lineID') }}" />
                            </div>
                        </div>
                    </div>

                    <!-- 結家アドレス -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputMsbyMail" class="control-label">
                                結家アドレス</label>
                            <div class="input-icon right">
                                <input id="inputMsbyMail" type="text" name="msby_mail" class="form-control singleOnly" value = "{{ old('msby_mail') }}" />
                            </div>
                        </div>
                    </div>

                    <!-- 転送用アドレス -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputOriginMail" class="control-label">
                                転送用アドレス</label>
                            <div class="input-icon right">
                                <input id="inputOriginMail" type="text" name="original_mail" class="form-control singleOnly" value = "{{ old('original_mail') }}" />
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>



              <div class="col-sm-12">
                <div class="col-sm-6">
                  <div class="row">
                    <!-- 現住所 -->
                    <div>
                      <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">現住所</h4>
                    </div>

                    <!-- 郵便番号 -->
                    <div class="h-adr">
                      <span class="p-country-name nonestyle">Japan</span>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputZipcode" class="control-label">
                                    郵便番号</label>
                                <div class="input-group">
                                  <span class="input-group-addon">〒</span>
                                  <input type="text" name="zipcode" id="inputZipcode" class="form-control singleOnly p-postal-code" placeholder="0000000">
                                </div>
                            </div>
                        </div>
                        <!-- 住所 -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputAddress" class="control-label">
                                    住所</label>
                                <div class="input-icon right">
                                  <input type="text" name="address" id="inputAddress" class="form-control p-region p-locality p-street-address p-extended-address"  value = "{{ old('address') }}">
                                </div>
                            </div>
                        </div>
                        <!-- 建物名 -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputMansion_name" class="control-label">
                                    建物名</label>
                                <div class="input-icon right">
                                  <input type="text" name="mansion_name" id="inputMansion_name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="col-sm-6">
                  <div class="row">
                    <!-- 住民票の住所 -->
                    <div>
                      <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">住民票の住所</h4>
                    </div>

                    <!-- 郵便番号 -->
                    <div class="h-adr">
                      <span class="p-country-name nonestyle">Japan</span>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputRZipcode" class="control-label">
                                    郵便番号</label>
                                <div class="input-group">
                                  <span class="input-group-addon">〒</span>
                                  <input type="text" name="r_zipcode" id="inputRZipcode" class="form-control singleOnly p-postal-code" placeholder="0000000">
                                </div>
                            </div>
                        </div>
                        <!-- 住所 -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputRAddress" class="control-label">
                                    住所</label>
                                <div class="input-icon right">
                                  <input type="text" name="resident_card" id="inputRAddress" class="form-control p-region p-locality p-street-address p-extended-address"  value = "{{ old('resident_card') }}">
                                </div>
                            </div>
                        </div>
                        <!-- 建物名 -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputRMansion_name" class="control-label">
                                    建物名</label>
                                <div class="input-icon right">
                                  <input type="text" name="r_mansion_name" id="inputRMansion_name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-sm-12">
                <div class="col-sm-6">
                  <div class="row">
                    <!-- 緊急連絡先 -->
                    <div>
                      <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">緊急連絡先</h4>
                    </div>

                    <!-- 緊急連絡者 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputE_name" class="control-label">
                                緊急連絡者</label>
                            <div class="input-icon right">
                              <input type="text" name="emergency_name" id="inputE_name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- 続柄 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputRelation" class="control-label">
                                続柄</label>
                            <div class="input-icon right">
                              <input type="text" name="relationship" id="inputRelation" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- 緊急連絡先 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputEmergency" class="control-label">
                                緊急連絡先</label>
                            <div class="input-icon right">
                              <input type="text" name="emergency" id="inputEmergency" class="form-control singleOnly">
                            </div>
                        </div>
                    </div>
                    <!-- 郵便番号 -->
                    <div class="h-adr">
                      <span class="p-country-name nonestyle">Japan</span>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputEZipcode" class="control-label">
                                    郵便番号</label>
                                <div class="input-group">
                                  <span class="input-group-addon">〒</span>
                                  <input type="text" name="e_zipcode" id="inputEZipcode" class="form-control singleOnly p-postal-code" placeholder="0000000">
                                </div>
                            </div>
                        </div>
                        <!-- 住所 -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputEAddress" class="control-label">
                                    住所</label>
                                <div class="input-icon right">
                                  <input type="text" name="emergency_address" id="inputEAddress" class="form-control p-region p-locality p-street-address p-extended-address"  value = "{{ old('emergency_address') }}">
                                </div>
                            </div>
                        </div>
                        <!-- 建物名 -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputEMansion_name" class="control-label">
                                    建物名</label>
                                <div class="input-icon right">
                                  <input type="text" name="e_mansion_name" id="inputEMansion_name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-sm-12">
                <div class="col-sm-6">
                  <div class="row">
                    <!-- 銀行関連 -->
                    <div>
                      <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:1px solid gray;">銀行情報</h4>
                    </div>

                    <!-- 銀行名 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputBank" class="control-label">
                                銀行名</label>
                            <div class="input-icon right">
                                <input id="inputBank" type="text" name="bank" class="form-control" value = "{{ old('bank') }}" />
                            </div>
                        </div>
                    </div>

                    <!-- 支店名 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputBank_b" class="control-label">
                                支店名</label>
                            <div class="input-icon right">
                                <input id="inputBank_b" type="text" name="bank_branch" class="form-control" value = "{{ old('bank_branch') }}" />
                            </div>
                        </div>
                    </div>

                    <!-- 口座種別 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">
                                口座種別</label>
                            <div class="input-icon right">
                              <select name="bank_type" class="form-control">
                                <option value=0 @if(old('bank_type')==0) selected  @endif>普通</option>
                                <option value=1 @if(old('bank_type')==1) selected  @endif>当座</option>
                              </select>
                            </div>
                        </div>
                    </div>

                    <!-- 口座番号 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputBank_num" class="control-label">
                                口座番号</label>
                            <div class="input-icon right">
                                <input id="inputBank_num" type="text" name="bank_number" class="form-control singleOnly" value = "{{ old('bank_number') }}" />
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-sm-12">
                <div class="col-sm-6">
                  <div class="row">
                    <!-- その他情報 -->
                    <div>
                      <h4 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">その他情報</h4>
                    </div>

                    <!-- 誕生日 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputBirthday" class="control-label">
                                誕生日</label>
                            <div class="input-icon right">
                              <input type="date" name="birthday" id="inputBirthday" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- 入社日 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputHire" class="control-label">
                                入社日</label>
                            <div class="input-icon right">
                              <input type="date" name="hire" id="inputHire" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- 業法上入社日 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputLegal_hire" class="control-label">
                                業法上入社日</label>
                            <div class="input-icon right">
                              <input type="date" name="legal_hire" id="inputLegal_hire" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- 従業員番号 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputEmployee_number" class="control-label">
                                従業員番号</label>
                            <div class="input-icon right">
                              <input type="text" name="employee_number" id="inputEmployee_number" class="form-control singleOnly">
                            </div>
                        </div>
                    </div>

                    <!-- 資格 -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputLicence" class="control-label">
                                資格</label>
                            <div class="input-icon right">
                              <textarea  name="licence" id="inputLicence" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                  </div>
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
