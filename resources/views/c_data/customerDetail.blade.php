@extends('layouts.c_data')

@section('content')

<div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper" style="margin:0">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">【 {{ $customerList->c_name }} 様】詳細</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
              <li><i class="fa fa-home"></i>&nbsp;<a href="{{ route('getTop') }}">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
              <li>&nbsp;<a href="{{ route('getCdata') }}">顧客管理TOP</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
              <li class="active"><a href="{{ route('c_data.c_list') }}">顧客一覧</a><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
              <li class="active">【 {{ $customerList->c_name }} 様】詳細</li>
            </ol>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div class="row mbl">
                    <div class="col-lg-12">
                      <div class="col-md-12">
                          <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                          </div>
                      </div>
                    </div>

                  <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="row">
                            <!-- ボタン -->
                              <div class="col-md-12">
                                <div class=" text-left">
                                <label class="control-label">各種編集ページへ</label>
                                  <a href="{{ route('c_data.editBase', [ 'id' => $customerList->id]) }}">
                                    <button type="btn" class="btn btn-xs btn-blue" name="btn" value="upload"  style="margin-right:20px;">
                                        基本情報/紹介者</button>
                                  </a>
                                  <a href="{{ route('c_data.editSales', [ 'id' => $customerList->id]) }}">
                                    <button type="btn" class="btn btn-xs btn-red" name="btn" value="upload"  style="margin-right:20px;">
                                        進捗/売上</button>
                                  </a>
                                  <a href="{{ route('c_data.editProperty', [ 'id' => $customerList->id]) }}">
                                    <button type="btn" class="btn btn-xs btn-dark" name="btn" value="upload"  style="margin-right:20px;">
                                        物件/その他</button>
                                  </a>
                                  <a href="#">
                                    <button type="btn" class="btn btn-xs btn-orange" name="btn" value="upload"  style="margin-right:20px;">
                                       各種ファイル</button>
                                  </a>
                                </div>
                              </div>
                            <!-- endボタン -->
                          </div>
                        </div>
                        <div class="col-lg-12" style="margin-top:20px;">
                          <div class="row">
                            <!-- 基本情報 -->
                              <div class="col-md-4">
                                <!-- お客様情報 -->
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">基本情報</div>
                                      <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                              <td>お客様名</td>
                                              <td>{{ $customerList->c_name }}</td>
                                            </tr>
                                            <tr>
                                              <td>ふりがな</td>
                                              <td>{{ $customerList->c_kana }}</td>
                                            </tr>
                                            <tr>
                                              <td>案件種別</td>
                                              <td>{{ $customerList->i_type }}</td>
                                            </tr>
                                            <tr>
                                              <td>紹介種別</td>
                                              <td>{{ $customerList->i_who }}</td>
                                            </tr>
                                            <tr>
                                              <td>携帯</td>
                                              <td>{{ $customerList->phone }}</td>
                                            </tr>
                                            <tr>
                                              <td>LINE</td>
                                              <td>{{ $customerList->line }}</td>
                                            </tr>
                                            <tr>
                                              <td>メール</td>
                                              <td>{{ $customerList->mail }}</td>
                                            </tr>
                                            <tr>
                                              <td>Facebook</td>
                                              <td>{{ $customerList->fb }}</td>
                                            </tr>
                                            <tr>
                                              <td>messenger</td>
                                              <td>{{ $customerList->messe }}</td>
                                            </tr>
                                            <tr>
                                              <td>誕生日</td>
                                              <td>{{ $customerList->birthday }}</td>
                                            </tr>
                                            <tr>
                                              <td>構成</td>
                                              <td>{{ $customerList->structure }}</td>
                                            </tr>
                                            <tr>
                                              <td>職業</td>
                                              <td>{{ $customerList->job }}</td>
                                            </tr>
                                            <tr>
                                              <td>会社名</td>
                                              <td>{{ $customerList->company_name }}</td>
                                            </tr>
                                            <tr>
                                              <td>実際の入居者</td>
                                              <td>{{ $customerList->actualResident }}</td>
                                            </tr>
                                            <tr>
                                              <td>実際に連絡を取っていた方</td>
                                              <td>{{ $customerList->contacter }}</td>
                                            </tr>
                                            <tr>
                                              <td>契約者との関係</td>
                                              <td>{{ $customerList->contacter_relation }}</td>
                                            </tr>
                                            <tr>
                                              <td>備考</td>
                                              <td>{{ $customerList->remark }}</td>
                                            </tr>
                                        </table>
                                      </div>
                                </div>
                              <!-- endお客様情報 -->

                              <!-- 紹介者情報 -->
                                <div class="panel panel-green">
                                    <div class="panel-heading">紹介者情報</div>
                                      <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                              <td>紹介者名</td>
                                              <td>{{ $customerList->i_name }}</td>
                                            </tr>
                                            <tr>
                                              <td>ふりがな</td>
                                              <td>{{ $customerList->i_kana }}</td>
                                            </tr>
                                            <tr>
                                              <td>関係性</td>
                                              <td>{{ $customerList->i_relation }}</td>
                                            </tr>
                                            <tr>
                                              <td>紹介月</td>
                                              <td>{{ date('Y年m月',  strtotime($customerList->i_month)) }}</td>
                                            </tr>
                                      </table>
                                      </div>
                                </div>
                              <!-- end紹介者情報 -->
                              </div>
                            <!-- end基本情報 -->

                            <!-- 対応進捗/紹介者 -->
                              <div class="col-md-4">
                                <!-- 進捗状況 -->
                                <div class="panel panel-red">
                                    <div class="panel-heading">進捗状況</div>
                                      <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                              <td>状況</td>
                                              <td>{{ $customerList->statues }}</td>
                                            </tr>
                                            <tr>
                                              <td>確度</td>
                                              <td>{{ $customerList->accuracy }}</td>
                                            </tr>
                                            <tr>
                                              <td>申込予定月</td>
                                              <td>{{ date('Y年m月',  strtotime($customerList->plannedApply)) }}</td>
                                            </tr>
                                            <tr>
                                              <td>進捗状況</td>
                                              <td>{{ $customerList->progress }}</td>
                                            </tr>
                                        </table>
                                      </div>
                                </div>
                                <!-- end進捗状況 -->

                                <!-- 売上情報 -->
                                <div class="panel panel-violet">
                                    <div class="panel-heading">売上情報</div>
                                      <div class="panel-body">
                                        <table class="table">
                                          @if($customerList->statues == "---" || $customerList->statues == "その他")
                                            <tr>
                                              <td>予定売上</td>
                                              <td>{{ $customerList->plannedSales }}</td>
                                            </tr>
                                            <tr>
                                              <td>着金予想月</td>
                                              @if($customerList->expectedPayment == null)
                                              <td></td>
                                              @else
                                              <td>{{ date('Y年m月',  strtotime($customerList->expectedPayment)) }}</td>
                                              @endif
                                            </tr>
                                          @endif

                                          @if($customerList->statues == "申込")
                                            <tr>
                                              <td>仲介手数料（予定）</td>
                                              <td>{{ $customerList->planBF }}</td>
                                            </tr>
                                            <tr>
                                              <td>仲手入金予定</td>
                                              @if($customerList->bfSche == null)
                                              <td></td>
                                              @else
                                              <td>{{ date('Y年m月d日',  strtotime($customerList->bfSche)) }}</td>
                                              @endif
                                            </tr>
                                            <tr>
                                              <td>AD（予定）</td>
                                              <td>{{ $customerList->planAD }}</td>
                                            </tr>
                                            <tr>
                                              <td>AD入金予定</td>
                                              @if($customerList->adSche == null)
                                              <td></td>
                                              @else
                                              <td>{{ date('Y年m月d日',  strtotime($customerList->adSche)) }}</td>
                                              @endif
                                            </tr>
                                            <tr>
                                          @endif
                                          @if($customerList->statues == "審査通過" || $customerList->statues == "契約締結(完了)")
                                            <tr>
                                              <td>仲介手数料</td>
                                              <td>{{ $customerList->bf }}</td>
                                            </tr>
                                            <tr>
                                              <td>仲手入金日</td>
                                              @if($customerList->bfDate == null)
                                              <td></td>
                                              @else
                                              <td>{{ date('Y年m月d日',  strtotime($customerList->bfDate)) }}</td>
                                              @endif
                                            </tr>
                                            <tr>
                                              <td>AD</td>
                                              <td>{{ $customerList->ad }}</td>
                                            </tr>
                                            <tr>
                                              <td>AD入金日</td>
                                              @if($customerList->adDate == null)
                                              <td></td>
                                              @else
                                              <td>{{ date('Y年m月d日',  strtotime($customerList->adDate)) }}</td>
                                              @endif
                                            </tr>
                                            <tr>
                                              <td>業務委託料</td>
                                              <td>{{ $customerList->outsource }}</td>
                                            </tr>
                                            <tr>
                                              <td>業務委託料入金日</td>
                                              @if(isset($customerList->osDate))
                                              <td>{{ date('Y年m月d日',  strtotime($customerList->osDate)) }}</td>
                                              @else
                                              <td></td>
                                              @endif
                                            </tr>
                                            <tr>
                                              <td>仲手相殺</td>
                                              <td>{{ $customerList->disBF }}</td>
                                            </tr>
                                            <tr>
                                              <td>AD相殺</td>
                                              <td>{{ $customerList->disAD }}</td>
                                            </tr>
                                            <tr>
                                              <td>外部紹介料</td>
                                              <td>{{ $customerList->introFee }}</td>
                                            </tr>
                                          @endif
                                        </table>
                                      </div>
                                </div>
                                <!-- end売上情報 -->

                                <!-- 各種ファイル -->
                                <div class="panel panel-orange">
                                    <div class="panel-heading">各種ファイル</div>
                                      <div class="panel-body">
                                        <table class="table">

                                        </table>
                                      </div>
                                </div>
                                <!-- end各種ファイル -->



                              </div>
                            <!-- end 対応進捗/紹介者 -->


                            <!-- 物件情報 -->
                              <div class="col-md-4">
                                <!-- 物件情報 -->
                                <div class="panel panel-dark">
                                    <div class="panel-heading">物件情報</div>
                                      <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                              <td>用途</td>
                                              <td>{{ $customerList->useType }}</td>
                                            </tr>
                                            <tr>
                                              <td>郵便番号</td>
                                              <td>{{ $customerList->zipcode }}</td>
                                            </tr>
                                            <tr>
                                              <td>住所</td>
                                              <td>{{ $customerList->address }}</td>
                                            </tr>
                                            <tr>
                                              <td>マンション</td>
                                              <td>{{ $customerList->mansion_name }}</td>
                                            </tr>
                                            @if($customerList->i_type == '【賃貸】自己案件' || $customerList->i_type == '【賃貸】社内紹介')
                                            <tr>
                                              <td>賃料</td>
                                              <td>{{ $customerList->rent }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                              <td>契約日</td>
                                              @if(isset($customerList->contractDate))
                                              <td>{{ date('Y年m月d日',  strtotime($customerList->contractDate)) }}</td>
                                              @else
                                              <td></td>
                                              @endif
                                            </tr>
                                            @if($customerList->i_type == '【賃貸】自己案件' || $customerList->i_type == '【賃貸】社内紹介')
                                            <tr>
                                              <td>賃発日</td>
                                              @if(isset($customerList->startDate))
                                              <td>{{ date('Y年m月d日',  strtotime($customerList->startDate)) }}</td>
                                              @else
                                              <td></td>
                                              @endif
                                            </tr>
                                            <tr>
                                              <td>解約日</td>
                                              @if(isset($customerList->endDate))
                                              <td>{{ date('Y年m月d日',  strtotime($customerList->endDate)) }}</td>
                                              @else
                                              <td></td>
                                              @endif
                                            </tr>
                                            <tr>
                                              <td>契約期間</td>
                                              <td>{{ $customerList->period }}</td>
                                            </tr>
                                            <tr>
                                              <td>解約予告</td>
                                              <td>{{ $customerList->notice }}</td>
                                            </tr>
                                            <tr>
                                              <td>更新料種別</td>
                                              <td>{{ $customerList->renewalType }}</td>
                                            </tr>
                                            <tr>
                                              <td>更新料</td>
                                              <td>{{ $customerList->renewalFee }}</td>
                                            </tr>
                                            @endif
                                            @if($customerList->i_type == '【売買】自己案件' || $customerList->i_type == '【売買】社内紹介')
                                            <tr>
                                              <td>決済日</td>
                                              @if(isset($customerList->settlementDate))
                                              <td>{{ date('Y年m月d日',  strtotime($customerList->settlementDate)) }}</td>
                                              @else
                                              <td></td>
                                              @endif
                                            </tr>
                                            <tr>
                                              <td>引渡日</td>
                                              @if(isset($customerList->contractDate))
                                              <td>{{ date('Y年m月d日',  strtotime($customerList->deliveryDate)) }}</td>
                                              @else
                                              <td></td>
                                              @endif
                                            </tr>
                                            @endif
                                            <tr><td colspan=2 class="text-center">書類発送先</td></tr>
                                            <tr>
                                              <td>宛名</td>
                                              <td>{{ $customerList->distinationName }}</td>
                                            </tr>
                                            <tr>
                                              <td>郵便番号</td>
                                              <td>{{ $customerList->d_zipcode }}</td>
                                            </tr>
                                            <tr>
                                              <td>住所</td>
                                              <td>{{ $customerList->d_address }}</td>
                                            </tr>
                                            <tr>
                                              <td>建物名</td>
                                              <td>{{ $customerList->d_mansion_name }}</td>
                                            </tr>


                                        </table>
                                      </div>
                                </div>
                                <!-- end物件情報 -->


                                <!-- その他情報 -->
                                <div class="panel panel-grey">
                                    <div class="panel-heading">その他情報</div>
                                      <div class="panel-body">
                                        <table class="table">
                                            @if($customerList->i_type == '【賃貸】自己案件' || $customerList->i_type == '【賃貸】社内紹介')
                                            <tr>
                                              <td>管理会社名</td>
                                              <td>{{ $customerList->mcName }}</td>
                                            </tr>
                                            <tr>
                                              <td>担当</td>
                                              <td>{{ $customerList->mcPerson }}</td>
                                            </tr>
                                            <tr>
                                              <td>電話</td>
                                              <td>{{ $customerList->mcTel }}</td>
                                            </tr>
                                            <tr>
                                              <td>FAX</td>
                                              <td>{{ $customerList->mcFax }}</td>
                                            </tr>
                                            <tr>
                                              <td>社宅代行</td>
                                              <td>{{ $customerList->acting }}</td>
                                            </tr>
                                            <tr>
                                              <td>担当</td>
                                              <td>{{ $customerList->actingPerson }}</td>
                                            </tr>
                                            <tr>
                                              <td>かな</td>
                                              <td>{{ $customerList->actingKana }}</td>
                                            </tr>
                                            @endif
                                            @if($customerList->i_type == '【売買】自己案件' || $customerList->i_type == '【売買】社内紹介')
                                            <tr>
                                              <td>銀行ローン</td>
                                              <td>{{ $customerList->loan }}</td>
                                            </tr>
                                            @endif
                                        </table>
                                      </div>
                                </div>
                                <!-- endその他情報 -->


                              </div>
                            <!-- end 物件情報 -->

                          </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!--END CONTENT-->
</div>


@endsection
