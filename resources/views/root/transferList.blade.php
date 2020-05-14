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
                    @if($now_month == 1)
                    【{{ $now_year - 1 }}年12月度】 振込額一覧　<span style="font-size:18px;">({{ $now_month }}月10日送金)</span>
                    @else
                    【{{ $now_year }}年{{ $now_month - 1 }}月度】 振込額一覧　<span style="font-size:18px;">({{ $now_month }}月10日送金)</span>
                    @endif
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


                        <div class="panel panel-red">
                            <div class="panel-heading">
                                @if($now_month == 1)
                                {{ $now_year - 1 }}年12月度&nbsp;<span style="font-size:12px;">({{ $now_month }}月10日送金)</span>
                                @else
                                {{ $now_year }}年{{ $now_month - 1 }}月度&nbsp;<span style="font-size:12px;">({{ $now_month }}月10日送金)</span>
                                @endif
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>名前</th>
                                            <th>振込額</th>
                                            <th>源泉額</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @for($i=0; $i < count($users); $i++)
                                        <tr>
                                            <td>{{ $users[$i]->name }}</td>
                                            <td style="text-align:right;">
                                                @if(empty($btArray))
                                                    {{ "" }}円
                                                @else
                                                    {{ number_format( $btArray[$i] )  }}円
                                                @endif
                                            </td>
                                            <td style="text-align:right;">
                                                @if(empty($btArray))
                                                    {{ "" }}円
                                                @else
                                                    {{ number_format( $tax[$i] )  }}円
                                                @endif
                                            </td>
                                        </tr>
                                    @endfor
                                        <tr>
                                            <td>合計</td>
                                            <td style="text-align:right;">{{ $taxSum }}円</td>
                                            <td style="text-align:right;">{{ $btSum }}円</td>
                                        </tr>
                                    </tbody>
                                    </div>
                                </table>
                            </div>
                      </div>
                   </div>
                </div>
            </div>
        <!--END CONTENT-->
        </div>
    <!--END PAGE WRAPPER-->
    </div>
</div>


@endsection
