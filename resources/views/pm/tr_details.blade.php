@extends('layouts.pm')

@section('content')

<div id="wrapper">
    @include('pm.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">
                    振込明細作成
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!-- 検索ナビ -->
        <!-- END検索ナビ -->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">
                  <div class="col-lg-12">
                    <div class="row">


                        <div class="panel panel-red">
                            <div class="panel-heading">
                            {{$now_year}}年{{$now_month}}月送金済みリスト
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>物件名</th>
                                            <th>号室</th>
                                            <th>オーナー名</th>
                                            <th>入居者名</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lists as $list)
                                        <tr>
                                            <td>{{$list['pms']['property_name']}}</td>
                                            <td>{{$list['pms']['room_number']}}</td>
                                            <td>{{$list['pms']['owner_name']}}</td>
                                            <td>{{$list['pms']['tenant_name']}}</td>
                                            <td class="col-sm-2" bordercolor="#45607a" bgcolor="#ffffff" align=center onmouseover="this.style.background='#ffff00'" onmouseout="this.style.background='#ffffff'">
                                            <a href="{{ route('pm.sp_new', ['id' => $list['id']]) }}"style="color:#ff0080;text-decoration:none;font-size:12px;width:100%;">
                                                振込明細書作成ページへ</a>
                                            </td>
                                        </tr>
                                        @endforeach
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
