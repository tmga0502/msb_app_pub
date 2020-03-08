@extends('layouts.commissions')

@section('content')

<div id="wrapper">
    @include('commissions.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title"> 個人売上まとめ</div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">
                    <!--  月間個人売上  -->
                    @include('commissions.individuals.monthly')
                    <!--  年間個人売上  -->
                    @include('commissions.individuals.year')
                  <div class="col-lg-12">
                    <div class="row">
                      <!-- 個別売上配分表 -->
                      <div class="panel panel-orange">
                            <div class="panel-heading">
                               @if($now_month == 1)
                                {{ $now_year - 1 }}年12月分売上配分一覧
                                @else
                                {{ $now_year }}年{{ $now_month - 1 }}月分売上配分一覧
                                @endif
                            </div>
                            <div class="panel-body">
                              <div class="table-wrapper">
                                <table class="table table-bordered">
                                @include('commissions.individuals.thead')

                                <!-- 賃貸部門 -->
                                @if(isset($indiviListRent[0]))
                                @include('commissions.individuals.rent')
                                @endif

                                <!-- 売買部門 -->
                                @if(isset($indiviListBuy[0]))
                                @include('commissions.individuals.buy')
                                @endif

                                <!-- 管理部門 -->
                                @if(isset($indiviListManage[0]))
                                @include('commissions.individuals.manage')
                                @endif

                                <!-- 業務委託部門 -->
                                @if(isset($indiviListOther[0]))
                                @include('commissions.individuals.other')
                                @endif

                                <!-- 合計 -->
                                @include('commissions.individuals.total')

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
