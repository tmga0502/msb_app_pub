@extends('layouts.commissions')

@section('content')

<div id="wrapper">
    @include('commissions.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title"> 【まとめ】売上配分一覧</div>
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
                    <div class="row">
                      <!-- 個別売上配分表 -->

                      <div class="panel panel-orange">
                            <div class="panel-heading">
                               @if($now_month == 1)
                                {{ $now_year - 1 }}年12月分売上配分入力
                                @else
                                {{ $now_year }}年{{ $now_month - 1 }}月分売上配分入力
                                @endif
                            </div>
                            <div class="panel-body">

                              <div class="table-wrapper">
                                <table class="table table-hover table-borde">
                                    <thead>
                                        <tr>
                                            <th>成約者<br>(借主・買主)</th>
                                            <th>成約者<br>(売主)</th>
                                            <th>物件名</th>
                                            <th>号室</th>
                                            <th>管理会社</th>
                                            <th>提携業者</th>
                                            <th>仲介手数料</th>
                                            <th>入金日</th>
                                            <th>広告料</th>
                                            <th>入金日</th>
                                            <th>管理報酬</th>
                                            <th>業務委託料</th>
                                            <th>入金日</th>
                                            <th>外部報酬料</th>
                                            <th>売上(税込)</th>
                                            <th>売上(税抜)</th>
                                            <th>成立台帳</th>
                                            <th>提供サービス</th>
                                            <th>新or旧</th>
                                            <th>レート上限</th>
                                            <th colspan=2>木山澤惇平</th>
                                            <th colspan=2>陣内裕大</th>
                                            <th colspan=2>堀生人視</th>
                                            <th colspan=2>川口美雄</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>BBさん</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                        <td>10000000</td>
                                      </tr>
                                    </tbody>
                                    </div>
                                </table>
                              </div>
                            </div>
                      </div>


                    </div>
                  </div>
                </div>
            </div>
        </div><!--END CONTENT-->
    <!--END PAGE WRAPPER-->
    </div>
</div>


@endsection
