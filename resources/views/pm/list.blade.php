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
                    管理物件一覧
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!-- 検索ナビ -->
            @include('pm.list.searchName')
        <!-- END検索ナビ -->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">
                  <div class="col-lg-12">
                    <div class="row" style="margin-left:50px;margin-right:50px;">


                        <div class="panel panel-red">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>状況</th>
                                            <th>物件名</th>
                                            <th>部屋番号</th>
                                            <th>オーナー</th>
                                            <th>入居者</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list as $list)
                                        <tr>
                                            <td>
                                                @if($list->status == 0)
                                                <a href="{{ route('pm.detail', [ 'id' => $list->id]) }}">募集中</a>
                                                @else
                                                <a href="{{ route('pm.detail', [ 'id' => $list->id]) }}">居住中</a>
                                                @endif
                                            </td>
                                            <td>{{$list->property_name}}</td>
                                            <td>{{$list->room_number}}</td>
                                            <td>
                                                @if($list->corporate_name == '')
                                                <a href="{{ route('pm.ownersDetail', [ 'id' => $list->owners_id]) }}">
                                                    {{$list->owner_name}}
                                                </a>
                                                @else
                                                <a href="{{ route('pm.ownersDetail', [ 'id' => $list->owners_id]) }}">
                                                    {{$list->corporate_name}}
                                                </a>
                                                @endif
                                            </td>
                                            <td>{{$list->tenant_name}}</td>
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
