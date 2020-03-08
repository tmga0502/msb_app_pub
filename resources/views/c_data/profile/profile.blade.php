
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">
                  <div class="col-lg-12">
                    <div class="row" style="margin-left:50px;margin-right:50px;">



                  <form action="{{ route('c_data.userDetail_update') }}" method="post" class="form-horizontal" style="margin: 50px 0px 50px 50px;">
                  <input type="hidden" name="id" value="{{ $userDetail->id }}">
                  <!-- 名前 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="InputName">
                      氏名
                    </label>
                    <div class="col-sm-6">
                      <input type="text" name="name" class="form-control" id="InputName" value = "{{ $userDetail->name }}" readonly>
                    </div>
                  </div>

                  <!-- ID -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="InputID">
                      ID
                    </label>
                    <div class="col-sm-6">
                      <input type="text" name="loginID" class="form-control" id="InputID" value = "{{ $userDetail->loginID }}" readonly>
                  </div>
                  </div>


                  <!-- 雇用形態 -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">
                      雇用形態
                    </label>
                    <label class="col-sm-6 control-label" style="text-align:left;">
                      @if($userDetail->contract_type == 0)
                        業務委託
                      @elseif($userDetail->contract_type == 1)
                        正社員
                      @elseif($userDetail->contract_type == 2)
                        アルバイト・パート
                      @else
                        役員
                      @endif
                    </label>
                      <input type="hidden" name="contract_type" value="{{$userDetail->contract_type}}">
                  </div>



                  <!-- 銀行関連 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">銀行情報</h5>
                  </div>
                  <div class="form-group">
                    <!-- 銀行名 -->
                    <label class="col-sm-2 control-label">銀行名</label>
                    <div class="col-sm-4">
                      <input type="text" name="bank" class="form-control"  value = "{{ $userDetail->bank }}"placeholder="銀行名">
                    </div>

                    <!-- 支店名 -->
                    <label class="col-sm-2 control-label">支店名</label>
                    <div class="col-sm-4">
                      <input type="text" name="bank_branch" class="form-control"  value = "{{ $userDetail->bank_branch }}"placeholder="支店名">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 口座種別 -->
                    <label class="col-sm-2 control-label">口座種別</label>
                    <div class="col-sm-2">
                      <select name="bank_type" class="form-control">
                       @if($userDetail->bank_type == 0)
                        <option value=0 selected>普通</option>
                        <option value=1>当座</option>
                       @else
                        <option value=0>普通</option>
                        <option value=1 selected>当座</option>
                       @endif
                      </select>
                    </div>
                    <!-- 口座番号 -->
                    <label class="col-sm-2 control-label">口座番号</label>
                    <div class="col-sm-6">
                      <input type="text" name="bank_number" class="form-control" value = "{{ $userDetail->bank_number }}" placeholder="口座番号">
                    </div>
                  </div>


                  <!-- 連絡先 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">連絡先</h5>
                  </div>
                  <div class="form-group">
                    <!-- 電話番号 -->
                    <label class="col-sm-2 control-label">電話番号</label>
                    <div class="col-sm-4">
                      <input type="text" name="tel" class="form-control" value = "{{ $userDetail->tel }}" placeholder="電話番号">
                    </div>

                    <!-- LineID -->
                    <label class="col-sm-2 control-label">LineID</label>
                    <div class="col-sm-4">
                      <input type="text" name="lineID" class="form-control" value = "{{ $userDetail->lineID }}" placeholder="LineID">
                    </div>
                  </div>


                  <div class="form-group">

                    <!-- 結家アドレス -->
                    <label class="col-sm-2 control-label">結家アドレス</label>
                    <div class="col-sm-4">
                      <input type="text" name="msby_mail" class="form-control" value = "{{ $userDetail->msby_mail }}" placeholder="結家アドレス" readonly>
                    </div>

                    <!-- 転送用アドレス -->
                    <label class="col-sm-2 control-label">転送用アドレス</label>
                    <div class="col-sm-4">
                      <input type="text" name="original_mail" class="form-control" value = "{{ $userDetail->original_mail }}" placeholder="転送用アドレス">
                    </div>
                  </div>


                  <!-- 住所 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">住所</h5>
                  </div>
                  <div class="form-group">
                    <!-- 現住所 -->
                    <label class="col-sm-2 control-label">現住所</label>
                    <div class="col-sm-10">
                      <input type="text" name="address" class="form-control" value = "{{ $userDetail->address }}" placeholder="現住所">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 住民票の住所 -->
                    <label class="col-sm-2 control-label">住民票の住所</label>
                    <div class="col-sm-10">
                      <input type="text" name="resident_card" class="form-control" value = "{{ $userDetail->resident_card }}" placeholder="住民票の住所">
                    </div>
                  </div>



                  <!-- 緊急連絡先 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">緊急連絡先</h5>
                  </div>
                  <div class="form-group">
                    <!-- 緊急連絡者 -->
                    <label class="col-sm-2 control-label">緊急連絡者</label>
                    <div class="col-sm-2">
                      <input type="text" name="emergency_name" class="form-control" value = "{{ $userDetail->emergency_name }}" placeholder="緊急連絡者">
                    </div>

                    <!-- 続柄 -->
                    <label class="col-sm-2 control-label">続柄</label>
                    <div class="col-sm-2">
                      <input type="text" name="relationship" class="form-control" value = "{{ $userDetail->relationship }}" placeholder="続柄">
                    </div>

                    <!-- 緊急連絡先 -->
                    <label class="col-sm-2 control-label">緊急連絡先</label>
                    <div class="col-sm-2">
                      <input type="text" name="emergency" class="form-control" value = "{{ $userDetail->emergency }}" placeholder="緊急連絡先">
                    </div>
                  </div>
                  <div class="form-group">
                    <!-- 緊連住所 -->
                    <label class="col-sm-2 control-label">緊連住所</label>
                    <div class="col-sm-10">
                      <input type="text" name="emergency_address" class="form-control" value = "{{ $userDetail->emergency_address }}" placeholder="緊連住所">
                    </div>
                  </div>



                  <!-- その他情報 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">その他情報</h5>
                  </div>
                  <div class="form-group">

                    <!-- 入社日 -->
                    <label class="col-sm-2 control-label">入社日</label>
                    <div class="col-sm-4">
                      <input type="date" name="hire" class="form-control" value = "{{ $userDetail->hire }}" placeholder="入社日" readonly>
                    </div>

                    <!-- 業法帖入社日 -->
                    <label class="col-sm-2 control-label">業法上入社日</label>
                    <div class="col-sm-4">
                      <input type="date" name="legal_hire" class="form-control" value = "{{ $userDetail->legal_hire }}" placeholder="業法上入社日" readonly>
                    </div>
                  </div>

                   <div class="form-group">

                   <!-- 誕生日 -->
                    <label class="col-sm-2 control-label">誕生日</label>
                    <div class="col-sm-4">
                      <input type="date" name="birthday" class="form-control" value = "{{ $userDetail->birthday }}" placeholder="誕生日">
                    </div>
                    <!-- 従業員番号 -->
                    <label class="col-sm-2 control-label">従業員番号</label>
                    <div class="col-sm-4">
                      <input type="text" name="employee_number" class="form-control" value = "{{ $userDetail->employee_number }}" placeholder="従業員番号" readonly>
                    </div>
                  </div>


                  <div class="form-group">
                  <!-- ウイルスソフト -->
                    <label class="col-sm-2 control-label">ウイルスソフト</label>
                    <div class="col-sm-4">
                      <input type="text" name="virus_soft" class="form-control" value = "{{ $userDetail->virus_soft }}" placeholder="ウイルスソフト">
                    </div>
                  </div>

                  <!-- 資格 -->
                  <div class="form-group">
                    <label class="col-sm-1 control-label">資格</label>
                    <div>
                      <textarea class="col-sm-11"  name="licence">{{ $userDetail->licence }}</textarea>
                    </div>
                  </div>


                 <!-- 退職 -->
                　<div>

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
        <!--END CONTENT-->
        </div>
    <!--END PAGE WRAPPER-->
    </div>
</div>
