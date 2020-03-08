@extends('layouts.root')

@section('content')

<div id="wrapper">
    @include('root.side_menu_signup')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">
                    エージェント一覧　
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
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>名前</th>
                                            <th>電話番号</th>
                                            <th>結家アドレス</th>
                                            <th>誕生日</th>
                                            <th>住所</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userList as $list)
                                        <tr>
                                            <td>
                                                <a href="{{ route('root.userDetail', ['id' => $list->id]) }}">
                                                {{$list->name}}
                                                </a>
                                            </td>
                                            <td>{{$list->tel}}</td>
                                            <td>{{$list->msby_mail}}</td>
                                            <td>{{$list->birthday}}</td>
                                            <td>{{$list->address}}</td>
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
