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
                 経費一覧
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">

        <!-- タブ -->
        <ul id="generalTab" class="nav nav-tabs responsive">
            <li class="active"><a href="#expenseSum_tub" data-toggle="tab">立替経費合計</a></li>
            <li><a href="#party-tab" data-toggle="tab">飲み会</a></li>
            <li><a href="#times-tab" data-toggle="tab">タイムズ</a></li>
            <li><a href="#c_cost-tab" data-toggle="tab">通信費</a></li>
            <li><a href="#atbb-tab" data-toggle="tab">ATBB</a></li>
            <li><a href="#regular-tab" data-toggle="tab">定期控除</a></li>
            <li><a href="#others-tab" data-toggle="tab">その他控除</a></li>
        </ul>
        <!-- endタブ -->
         <div id="generalTabContent" class="tab-content responsive">
            <div id="expenseSum_tub" class="tab-pane fade in active">
                @include('root.expenseList.expenseSum')
            </div>

            <div id="party-tab" class="tab-pane fade">
              @include('root.expenseList.partySum')
            </div>

            <div id="times-tab" class="tab-pane fade">
              @include('root.expenseList.timesSum')
            </div>

            <div id="c_cost-tab" class="tab-pane fade">
              @include('root.expenseList.c_costSum')
            </div>

            <div id="atbb-tab" class="tab-pane fade">
              @include('root.expenseList.atbbSum')
            </div>

            <div id="regular-tab" class="tab-pane fade">
              @include('root.expenseList.regularSum')
            </div>

            <div id="others-tab" class="tab-pane fade">
              @include('root.expenseList.othersSum')
            </div>
         </div>

        <!--END CONTENT-->
    </div>
</div>

@endsection
