@extends('layouts.bp')

@section('content')

@if(Auth::check())
    @include('bp.topbar')
@else
    @include('topbar_guest')
@endif

  <div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    @include('bp.side_menu')
    <div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                人財詳細
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

                  <form action="{{ route('updateBP', ['id' => $bp->id ]) }}" method="post" >
                  @csrf
                  <!-- id埋込 -->
                  <input type="hidden" name="bp_id" value="{{ $bp->id }}">
                  <div class="form-body pal">
                      <div class="row">


                      <!-- 会社名 -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="inputName" class="control-label">
                                      会社名</label>
                                  <div class="input-icon right">
                                      <input id="inputName" type="text" class="form-control" name="companies_name" value="{{ $bp->companies_name }}"/>
                                  </div>
                              </div>
                          </div>

                          <!-- 会社属性 -->
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">
                                      会社属性</label>
                                  <div class="input-icon right">
                                    <select name="company_type" class="form-control">
                                      <option value="人財・案件を提案" @if($bp->company_type=='人財・案件を提案') selected  @endif>人財・案件を提案</option>
                                      <option value="人財のみ提案" @if($bp->company_type=='人財のみ提案') selected  @endif>人財のみ提案</option>
                                      <option value="案件のみ提案" @if($bp->company_type=='案件のみ提案') selected  @endif>案件のみ提案</option>
                                      <option value="配信禁止顧客" @if($bp->company_type=='配信禁止顧客') selected  @endif>配信禁止顧客</option>
                                    </select>
                                  </div>
                              </div>
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
                                        <input type="text" name="c_zipcode" id="inputZipcode" class="form-control singleOnly p-postal-code" placeholder="0000000" value="{{ $bp->c_zipcode }}">
                                      </div>
                                  </div>
                              </div>
                              <!-- 住所 -->
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="inputAddress" class="control-label">
                                          住所</label>
                                      <div class="input-icon right">
                                        <input type="text" name="c_address" id="inputAddress" class="form-control p-region p-locality p-street-address p-extended-address" value="{{ $bp->c_address }}">
                                      </div>
                                  </div>
                              </div>
                              <!-- 建物名 -->
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="inputBuilding_name" class="control-label">
                                          建物名</label>
                                      <div class="input-icon right">
                                        <input type="text" name="c_building_name" id="inputBuilding_name" class="form-control" value="{{ $bp->c_building_name }}">
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- 電話 -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="inputPhone" class="control-label">
                                      電話番号</label>
                                  <div class="input-icon right">
                                      <i class="fa fa-mobile-phone"></i>
                                      <input id="inputPhone" type="text" class="form-control singleOnly" name="c_tel" value="{{ $bp->c_tel }}"/></div>
                              </div>
                          </div>
                          <!-- FAX -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="inputFax" class="control-label">
                                      FAX</label>
                                  <div class="input-icon right">
                                    <i class="fa fa-envelope "></i>
                                    <input id="inputFax" type="text" class="form-control" name="c_fax" value="{{ $bp->c_fax }}"/>
                                  </div>
                              </div>
                          </div>

                          <!-- URL -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="inputFax" class="control-label">
                                      URL</label>
                                  <input id="inputFax" type="text" class="form-control" name="url" value="{{ $bp->url }}"/>
                              </div>
                          </div>

                          <!-- メモ -->
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="inputMemo" class="control-label">
                                      メモ</label>
                                  <textarea class="form-control" name="c_memo">{{ $bp->c_memo }}</textarea>
                              </div>
                          </div>

                          <!-- 担当者 -->
                          <div>
                            <h4 class="col-sm-12" id="separator">担当者</h4>
                          </div>

                          <!-- 営業担当者名 -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="inputStaffName" class="control-label">
                                      営業担当者名</label>
                                  <input id="inputStaffName" type="text" class="form-control" name="sales_staff_name" value="{{ $bp->sales_staff_name }}"/>
                              </div>
                          </div>
                          <!-- 営業担当者かな -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="inputStaffKana" class="control-label">
                                      かな</label>
                                  <input id="inputStaffKana" type="text" class="form-control" name="sales_staff_kana" value="{{ $bp->sales_staff_kana }}"/>
                              </div>
                          </div>

                          <!-- 電話 -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="inputPhone" class="control-label">
                                      電話番号</label>
                                  <div class="input-icon right">
                                      <i class="fa fa-mobile-phone"></i>
                                      <input id="inputPhone" type="text" class="form-control singleOnly" name="sales_staff_phone" value="{{ $bp->sales_staff_phone }}"/></div>
                              </div>
                          </div>
                          <!-- メール -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="inputMail_address" class="control-label">
                                      メールアドレス</label>
                                  <div class="input-icon right">
                                    <i class="fa fa-envelope "></i>
                                    <input id="inputMail_address" type="text" class="form-control" name="sales_staff_mail" value="{{ $bp->sales_staff_mail }}"/>
                                  </div>
                              </div>
                          </div>

                          <!-- 請求担当者のid埋込 -->
                          @foreach($cp as $cp1)
                          <input type="hidden" name="id[{{ $loop->index }}]" value="{{ $cp1->id }}">
                          @endforeach

                          @foreach($cp as $cp)
                          <!-- 請求担当者 -->
                          <div class="cp" data-formno="{{$loop->index}}">
                            <h4 class="col-sm-12 cp_sepa" id="separator">
                                請求担当者{{$loop->iteration}}
                                <input type="button" value="＋" class="add pluralBtn">
                                <input type="button" value="－" class="del pluralBtn">
                            </h4>


                            <!-- 請求担当者のid埋込 -->
                            <input type="hidden" class="form-control cp_id" name="cp_id[{{ $loop->index }}]" value="{{ $cp->id }}">


                            <!-- 請求担当者名 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputCpName" class="control-label">
                                        名前</label>
                                    <input id="inputCpName" type="text" class="form-control cp_name" name="cp_name[{{ $loop->index }}]" value="{{ $cp->cp_name }}"/>
                                </div>
                            </div>
                            <!-- 請求担当者かな -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputCpKana" class="control-label">
                                        かな</label>
                                    <input id="inputCpKana" type="text" class="form-control cp_kana" name="cp_kana[{{ $loop->index }}]" value="{{ $cp->cp_kana }}"/>
                                </div>
                            </div>

                            <!-- 電話 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputCpPhone" class="control-label">
                                        電話番号</label>
                                    <div class="input-icon right">
                                        <i class="fa fa-mobile-phone"></i>
                                        <input id="inputCpPhone" type="text" class="form-control singleOnly cp_tel" name="cp_tel[{{ $loop->index }}]" value="{{ $cp->cp_tel }}"/></div>
                                </div>
                            </div>
                            <!-- メール -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputCpMail" class="control-label">
                                        メールアドレス</label>
                                    <div class="input-icon right">
                                        <i class="fa fa-envelope "></i>
                                        <input id="inputCpMail" type="text" class="form-control cp_mail" name="cp_mail[{{ $loop->index }}]" value="{{ $cp->cp_mail }}"/>
                                    </div>
                                </div>
                            </div>
                          </div>
                          @endforeach

                          <!-- 銀行関連 -->
                          <div>
                            <h4 class="col-sm-12" id="separator">銀行情報</h4>
                          </div>


                          <!-- 銀行コード -->
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="inputBank_code" class="control-label">
                                      銀行コード</label>
                                  <div class="input-icon right">
                                      <input id="inputBank_code" type="text"  class="form-control singleOnly" name="c_bank_code" value="{{ $bp->c_bank_code }}"/></div>
                              </div>
                          </div>

                          <!-- 銀行名 -->
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="inputBank_name" class="control-label">
                                      銀行名</label>
                                  <div class="input-icon right">
                                      <input id="inputBank_name" type="text"  class="form-control" name="c_bank_name" value="{{ $bp->c_bank_name }}"/></div>
                              </div>
                          </div>

                          <!-- 種別 -->
                          <div class="col-md-4">
                              <div class="form-group">
                                  <div class="input-icon right">
                                    <label class="control-label">
                                      　</label>
                                    <select name="c_bank_name_type" class="form-control">
                                      <option value="銀行" @if($bp->c_bank_name_type=='銀行') selected  @endif>銀行</option>
                                      <option value="信用金庫" @if($bp->c_bank_name_type=='信用金庫') selected  @endif>信用金庫</option>
                                      <option value="労働金庫" @if($bp->c_bank_name_type=='労働金庫') selected  @endif>労働金庫</option>
                                      <option value="信用組合" @if($bp->c_bank_name_type=='信用組合') selected  @endif>信用組合</option>
                                      <option value="漁協" @if($bp->c_bank_name_type=='漁協') selected  @endif>漁協</option>
                                      <option value="農協" @if($bp->c_bank_name_type=='農協') selected  @endif>農協</option>
                                    </select>
                                  </div>
                              </div>
                          </div>

                          <!-- 支店コード -->
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="inputBranch_code" class="control-label">
                                      支店コード</label>
                                  <div class="input-icon right">
                                      <input id="inputBranch_code" type="text"  class="form-control singleOnly" name="c_branch_code" value="{{ $bp->c_branch_code }}"/></div>
                              </div>
                          </div>

                          <!-- 支店名 -->
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="inputBranch_name" class="control-label">
                                      支店名</label>
                                  <div class="input-icon right">
                                      <input id="inputBranch_name" type="text"  class="form-control" name="c_branch_name" value="{{ $bp->c_branch_name }}"/></div>
                              </div>
                          </div>

                          <!-- 種別 -->
                          <div class="col-md-4">
                              <div class="form-group">
                                  <div class="input-icon right">
                                    <label for="inputName" class="control-label">
                                      　</label>
                                    <select name="c_branch_type" class="form-control">
                                      <option value="支店" @if($bp->c_branch_type=='支店') selected  @endif>支店</option>
                                      <option value="本店" @if($bp->c_branch_type=='本店') selected  @endif>本店</option>
                                      <option value="本所" @if($bp->c_branch_type=='本所') selected  @endif>本所</option>
                                      <option value="支所" @if($bp->c_branch_type=='支所') selected  @endif>支所</option>
                                      <option value="出張所" @if($bp->c_branch_type=='出張所') selected  @endif>出張所</option>
                                      <option value="営業部" @if($bp->c_branch_type=='営業部') selected  @endif>営業部</option>
                                    </select>
                                  </div>
                              </div>
                          </div>

                          <!-- 口座種別 -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label class="control-label">
                                      口座種別</label>
                                  <select name="c_bank_type" class="form-control">
                                      <option value=0 @if($bp->c_bank_type==0) selected  @endif>普通</option>
                                      <option value=1 @if($bp->c_bank_type==1) selected  @endif>当座</option>
                                    </select>
                              </div>
                          </div>

                          <!-- 口座番号 -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="inputBank_number" class="control-label">
                                      口座番号</label>
                                  <div class="input-icon right">
                                      <input id="inputBank_number" type="text" class="form-control singleOnly" name="c_bank_number" value="{{ $bp->c_bank_number }}"/></div>
                              </div>
                          </div>


                          <!-- 契約書関連 -->
                          <div>
                            <h4 class="col-sm-12" id="separator">契約書関連</h4>
                          </div>

                          <!-- 契約関連 -->
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">
                                      業務委託契約書</label>
                                <input type="file">
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">
                                      秘密保持契約書</label>
                                <input type="file">
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">
                                      合意締結証明書</label>
                                <input type="file">
                              </div>
                          </div>



                      </div>

                  </div>

                      <!-- 送信ボタン -->
                      <div class=" text-center pal">
                          <button type="submit" class="btn btn-primary" name="btn" value="upload">
                              更新</button>
                      </div>
                      </div>
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
