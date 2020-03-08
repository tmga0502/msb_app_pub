@extends('layouts.root')

@section('content')

<div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <span style="color:red;">ブラウザの【戻る】ボタンで戻ってね</span>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">

                <!-- 一覧テーブル -->
                  <div class="col-lg-12">
                    <div class="row" style="margin-left:50px;margin-right:50px;">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                {{ $month }}月分入金リスト
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordegreen">
                                    <thead>
                                        <tr>
                                            <th>口座名</th>
                                            <th>年月</th>
                                            <th>摘要</th>
                                            <th>お預り金額</th>
                                            <th>名目</th>
                                            <th>担当</th>
                                            <th>備考</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $data)
                                        <tr>
                                            @if($data -> bank_number == 0)
                                            <td>現金受領・紹介料</td>
                                            @else
                                            <td>{{ $data -> bank_number }}</td>
                                            @endif
                                            <td>{{ $data -> year }}年{{ $data -> month }}月</td>
                                            <td>{{ $data -> name }}</td>
                                            <td>
                                              <div style="text-align:right;">
                                                {{ number_format($data -> price) }}円
                                              </div>
                                            </td>
                                            <td>{{ $data -> nominal }}</td>
                                            <td>{{ $data -> person }}</td>
                                            <td>{{ $data -> remark }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </div>
                                </table>
                    <!-- end一覧テーブル -->
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
