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
                    CSV登録・一覧
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">

            <div class="col-lg-12">
                <div class="row">
                    <!-- ファイル登録 -->
                    <div class="col-lg-6">
                        <div class="row" style="margin-left:50px;margin-right:50px;">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">CSV登録</div>
                                <div class="panel-body">
                                    <form role="form" method="POST" action="{{ route('root.csv_upload') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-xs-12">
                                            <input type="file" id="file" name="file" class="form-control">
                                        </div>
                                        <div class="col-lg-12" style="height:20px">
                                        </div>
                                        <div class="col-xs-6">
                                            <select class="form-control" name="bank_number">
                                                <option value="17">17口座</option>
                                                <option value="19">19口座</option>
                                                <option value="0">現金受領・紹介料</option>
                                            </select>
                                        </div>

                                        <div class="col-xs-2">
                                            <input type="submit" class="btn btn-blue btn-md" id="upload" value="登録">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- endファイル登録 -->

                    <!-- 登録済み一覧テーブル -->
                    <div class="col-lg-6">
                        <div class="row" style="margin-left:50px;margin-right:50px;">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    過去分入金リスト
                                </div>
                                <div class="panel-body">
                                    @if(isset($lists[0]))
                                    <table class="table table-hover table-borde">
                                        <thead>
                                            <tr>
                                                <th>口座名</th>
                                                <th>年月</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($lists))
                                            @foreach($lists as $list)
                                            <tr>
                                                @if($list -> bank_number == 0)
                                                <td>現or紹</td>
                                                @else
                                                <td>{{ $list -> bank_number }}</td>
                                                @endif
                                                <td>{{ $list -> year }}年{{ $list -> month }}月</td>
                                                <td style="text-align:center;">
                                                    <a href="{{ route('root.csv_backnumber', ['b_number' => $list->bank_number, 'year' => $list->year, 'month' => $list->month]) }}">
                                                        <input type="button" class="btn btn-blue btn-xs" value="表示">
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                </div>
                                </table>

                                @else
                                <h3>登録はまだCSVを登録していません</h3>
                                @endif
                                <!-- ページネーション用link -->
                                <div class="d-flex justify-content-center">
                                    {{ $lists->links() }}
                                </div>
                                <!-- endページネーション用link -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end登録済み一覧テーブル -->
            </div>
        </div>
        <!-- endファイル登録 -->

        <!-- 空白のためのdiv -->
        <div class="col-lg-12" style="height:50px">
        </div>
        <!-- end空白のためのdiv -->

        <!-- 一覧テーブル -->

        <!-- タブ -->
        <ul id="generalTab" class="nav nav-tabs responsive">
            <li class="active"><a href="#csv17" data-toggle="tab">17口座</a></li>
            <li><a href="#party-tab" data-toggle="tab">19口座</a></li>
            <li><a href="#times-tab" data-toggle="tab">現金受領・紹介料</a></li>
        </ul>
        <!-- endタブ -->
         <div id="generalTabContent" class="tab-content responsive">
            <div id="csv17" class="tab-pane fade in active">
                @include('root.csvListTab.csv17')
            </div>

            <div id="party-tab" class="tab-pane fade">
              @include('root.expenseList.partySum')
            </div>

            <div id="times-tab" class="tab-pane fade">
              @include('root.expenseList.timesSum')
            </div>

         </div>
        
        
    </div>


    <!--END CONTENT-->
</div>
<!--END PAGE WRAPPER-->
</div>
</div>

@endsection
