@extends('layouts.commissions')

@section('content')

<div id="wrapper">
  @include('commissions.side_menu')
  <!--BEGIN PAGE WRAPPER-->
  <div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
      <div class="page-header pull-left">
        <div class="page-title"> 売上配分一覧</div>
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
              <div class="panel panel-red">
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
                      @include('commissions.all.thead')

                      <!-- 賃貸部門 -->
                      @if(isset($allList[0]))
                      @include('commissions.all.allList')
                      @endif

                      <!-- 合計 -->
                      @include('commissions.all.total')

                      <!-- 立替経費 -->
                      @include('commissions.all.expense')

                      <!-- 報酬 -->
                      @include('commissions.all.reward')

                      <!-- 源泉額 -->
                      @include('commissions.all.tax')

                      <!-- 振込額合計 -->
                      @include('commissions.all.bankTransfer')

                    </table>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
    <!--END CONTENT-->
    <!--END PAGE WRAPPER-->
  </div>
</div>


@endsection
