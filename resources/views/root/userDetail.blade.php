@extends('layouts.root')

@section('content')

<div id="wrapper">
    @include('root.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">
                    【{{$userDetail->name}}】詳細
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">
                  <div class="col-lg-12">
                    <div class="row" style="margin-left:50px;margin-right:50px;">



                  <form action="{{ route('root.userDetail_update') }}" method="post" class="form-horizontal" style="margin: 50px 0px 50px 50px;">
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
                    <div class="col-sm-6">
                      <select name="contract_type" class="form-control">
                      @if($userDetail->contract_type == 0)
                        <option value=0 selected>業務委託</option>
                        <option value=1>正社員</option>
                        <option value=2>アルバイト・パート</option>
                        <option value=3>役員</option>
                      @elseif($userDetail->contract_type == 1)
                        <option value=0>業務委託</option>
                        <option value=1 selected>正社員</option>
                        <option value=2>アルバイト・パート</option>
                        <option value=3>役員</option>
                      @elseif($userDetail->contract_type == 2)
                        <option value=0>業務委託</option>
                        <option value=1>正社員</option>
                        <option value=2 selected>アルバイト・パート</option>
                        <option value=3>役員</option>
                      @else
                        <option value=0>業務委託</option>
                        <option value=1>正社員</option>
                        <option value=2>アルバイト・パート</option>
                        <option value=3 selected>役員</option>
                      @endif
                      </select>
                    </div>
                  </div>



                  @if($userDetail->contract_type == 1)
                  <!-- 固定給等 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">給与情報</h5>
                  </div>
                  <div class="form-group">
                    <!-- 固定給 -->
                    <label class="col-sm-1 control-label">固定給</label>
                    <div class="col-sm-2">
                      <input type="number" name="salary" class="form-control"  value = "{{ $userDetail->salary }}">
                    </div>

                    <!-- 役員報酬 -->
                    <label class="col-sm-1 control-label">役員報酬</label>
                    <div class="col-sm-2">
                      <input type="number" name="remuneration" class="form-control"  value = "{{ $userDetail->remuneration }}">
                    </div>

                    <!-- 社宅 -->
                    <label class="col-sm-1 control-label">社宅</label>
                    <div class="col-sm-2">
                      <input type="number" name="rent" class="form-control"  value = "{{ $userDetail->rent }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 健康保険料 -->
                    <label class="col-sm-1 control-label">健康保険料</label>
                    <div class="col-sm-2">
                      <input type="number" name="HealthInsurance" class="form-control"  value = "{{ $userDetail->HealthInsurance }}">
                    </div>

                    <!-- 介護保険料 -->
                    <label class="col-sm-1 control-label">介護保険料</label>
                    <div class="col-sm-2">
                      <input type="number" name="CareInsurance" class="form-control"  value = "{{ $userDetail->CareInsurance }}">
                    </div>

                    <!-- 厚生年金 -->
                    <label class="col-sm-1 control-label">厚生年金</label>
                    <div class="col-sm-2">
                      <input type="number" name="WelfarePension" class="form-control"  value = "{{ $userDetail->WelfarePension }}">
                    </div>

                    <!-- 雇用保険料 -->
                    <label class="col-sm-1 control-label">雇用保険料</label>
                    <div class="col-sm-2">
                      <input type="number" name="EmploInsurance" class="form-control"  value = "{{ $userDetail->EmploInsurance }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- 所得税 -->
                    <label class="col-sm-1 control-label">所得税</label>
                    <div class="col-sm-2">
                      <input type="number" name="incomeTax" class="form-control"  value = "{{ $userDetail->incomeTax }}">
                    </div>

                    <!-- 住民税 -->
                    <label class="col-sm-1 control-label">住民税</label>
                    <div class="col-sm-2">
                      <input type="number" name="residentTax" class="form-control"  value = "{{ $userDetail->residentTax }}">
                    </div>

                  </div>
                  @endif








                  <!-- 銀行関連 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">銀行情報</h5>
                  </div>
                  <div class="form-group">
                    <!-- 銀行名 -->
                    <label class="col-sm-1 control-label">銀行名</label>
                    <div class="col-sm-2">
                      <input type="text" name="bank" class="form-control"  value = "{{ $userDetail->bank }}"placeholder="銀行名">
                    </div>

                    <!-- 支店名 -->
                    <label class="col-sm-1 control-label">支店名</label>
                    <div class="col-sm-2">
                      <input type="text" name="bank_branch" class="form-control"  value = "{{ $userDetail->bank_branch }}"placeholder="支店名">
                    </div>

                    <!-- 口座種別 -->
                    <label class="col-sm-1 control-label">口座種別</label>
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
                    <label class="col-sm-1 control-label">口座番号</label>
                    <div class="col-sm-2">
                      <input type="text" name="bank_number" class="form-control" value = "{{ $userDetail->bank_number }}" placeholder="口座番号">
                    </div>
                  </div>

                  <!-- 連絡先 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">連絡先</h5>
                  </div>
                  <div class="form-group">
                    <!-- 電話番号 -->
                    <label class="col-sm-1 control-label">電話番号</label>
                    <div class="col-sm-2">
                      <input type="text" name="tel" class="form-control" value = "{{ $userDetail->tel }}" placeholder="電話番号">
                    </div>

                    <!-- LineID -->
                    <label class="col-sm-1 control-label">LineID</label>
                    <div class="col-sm-2">
                      <input type="text" name="lineID" class="form-control" value = "{{ $userDetail->lineID }}" placeholder="LineID">
                    </div>

                    <!-- 結家アドレス -->
                    <label class="col-sm-1 control-label">結家アドレス</label>
                    <div class="col-sm-2">
                      <input type="text" name="msby_mail" class="form-control" value = "{{ $userDetail->msby_mail }}" placeholder="結家アドレス">
                    </div>

                    <!-- 転送用アドレス -->
                    <label class="col-sm-1 control-label">転送用アドレス</label>
                    <div class="col-sm-2">
                      <input type="text" name="original_mail" class="form-control" value = "{{ $userDetail->original_mail }}" placeholder="転送用アドレス">
                    </div>
                  </div>


                  <!-- 住所 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">住所</h5>
                  </div>
                  <div class="form-group">
                    <!-- 現住所 -->
                    <label class="col-sm-1 control-label">現住所</label>
                    <div class="col-sm-5">
                      <input type="text" name="address" class="form-control" value = "{{ $userDetail->address }}" placeholder="現住所">
                    </div>

                    <!-- 住民票の住所 -->
                    <label class="col-sm-1 control-label">住民票の住所</label>
                    <div class="col-sm-5">
                      <input type="text" name="resident_card" class="form-control" value = "{{ $userDetail->resident_card }}" placeholder="住民票の住所">
                    </div>
                  </div>



                  <!-- 緊急連絡先 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">緊急連絡先</h5>
                  </div>
                  <div class="form-group">
                    <!-- 緊急連絡者 -->
                    <label class="col-sm-1 control-label">緊急連絡者</label>
                    <div class="col-sm-2">
                      <input type="text" name="emergency_name" class="form-control" value = "{{ $userDetail->emergency_name }}" placeholder="緊急連絡者">
                    </div>

                    <!-- 続柄 -->
                    <label class="col-sm-1 control-label">続柄</label>
                    <div class="col-sm-2">
                      <input type="text" name="relationship" class="form-control" value = "{{ $userDetail->relationship }}" placeholder="続柄">
                    </div>

                    <!-- 緊急連絡先 -->
                    <label class="col-sm-1 control-label">緊急連絡先</label>
                    <div class="col-sm-2">
                      <input type="text" name="emergency" class="form-control" value = "{{ $userDetail->emergency }}" placeholder="緊急連絡先">
                    </div>
                  </div>
                  <div class="form-group">
                    <!-- 緊連住所 -->
                    <label class="col-sm-1 control-label">緊連住所</label>
                    <div class="col-sm-5">
                      <input type="text" name="emergency_address" class="form-control" value = "{{ $userDetail->emergency_address }}" placeholder="緊連住所">
                    </div>
                  </div>



                  <!-- その他情報 -->
                  <div>
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">その他情報</h5>
                  </div>
                  <div class="form-group">
                    <!-- 誕生日 -->
                    <label class="col-sm-1 control-label">誕生日</label>
                    <div class="col-sm-2">
                      <input type="date" name="birthday" class="form-control" value = "{{ $userDetail->birthday }}" placeholder="誕生日">
                    </div>

                    <!-- 入社日 -->
                    <label class="col-sm-1 control-label">入社日</label>
                    <div class="col-sm-2">
                      <input type="date" name="hire" class="form-control" value = "{{ $userDetail->hire }}" placeholder="入社日">
                    </div>

                    <!-- 業法帖入社日 -->
                    <label class="col-sm-1 control-label">業法上入社日</label>
                    <div class="col-sm-2">
                      <input type="date" name="legal_hire" class="form-control" value = "{{ $userDetail->legal_hire }}" placeholder="業法上入社日">
                    </div>

                    <!-- 従業員番号 -->
                    <label class="col-sm-1 control-label">従業員番号</label>
                    <div class="col-sm-2">
                      <input type="text" name="employee_number" class="form-control" value = "{{ $userDetail->employee_number }}" placeholder="従業員番号">
                    </div>
                  </div>
                  <!-- ウイルスソフト -->
                  <div class="form-group">
                    <label class="col-sm-1 control-label">ウイルスソフト</label>
                    <div class="col-sm-5">
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
                    <h5 class="col-sm-12" style="text-align:center;padding-top:20px;padding-bottom:20px;border-top:1px solid gray;">退職</h5>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                        <input type="button" class="btn btn-sm btn-green" id="leaving_btn" value="退職日表示" onclick="leaving_block()">
                    </div>
                    <!-- 退職日 -->
                    <label class="col-sm-1 control-label" id="leaving_label" style="display:none">退職日</label>
                    <div class="col-sm-4" id="leaving_div" style="display:none">
                      <input type="date" name="leaving" class="form-control" placeholder="退職日">
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
        <!--END CONTENT-->
        </div>
    <!--END PAGE WRAPPER-->
    </div>
</div>


@endsection
