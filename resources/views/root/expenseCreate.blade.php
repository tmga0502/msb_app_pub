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
                 経費登録
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">

        <!-- 検索ナビ -->
            <div class="row">
                <div class="col-lg-12">
                    <nav role="navigation" class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand">検索</a></div>
                            <div id="bs-example-navbar-collapse-2" class="collapse navbar-collapse">
                                <form action="{{ route('root.searchExpense_create') }}" method="POST" role="search" class="navbar-form navbar-left">
                                @csrf
                                <input type="month" class="form-control" name="date">
                                <button type="submit" name='search' class="btn btn-blue">検索</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="submit" name="clear" class="btn btn-blue">クリア</button>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        <!-- END検索ナビ -->

    <!-- 一覧テーブル -->
        <div class="col-lg-12">
        <div class="row">
            <div class="panel panel-green">
                <div class="panel-heading">
                    @if($now_month == 1)
                    {{ $now_year - 1 }}年12月分経費登録
                    @else
                    {{ $now_year }}年{{ $now_month - 1 }}月分経費登録
                    @endif
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>名前</th>
                                <th>飲み会</th>
                                <th>タイムズ</th>
                                <th>通信費</th>
                                <th>ATBB</th>
                                <th>ATBB顧客用</th>
                                <th>定期控除</th>
                                <th>その他控除１</th>
                                <th>その他１備考</th>
                                <th>その他控除２</th>
                                <th>その他２備考</th>
                                <th>その他控除３</th>
                                <th>その他３備考</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="POST" action="{{ route('root.expense_create_new') }}">
                            @csrf
                            @if($now_month == 1)
                            <input type="hidden" name="year" value="{{ $now_year - 1 }}">
                            <input type="hidden" name="month" value="12">
                            @else
                            <input type="hidden" name="year" value="{{ $now_year }}">
                            <input type="hidden" name="month" value="{{ $now_month - 1 }}">
                            @endif

                            @for($i=0; $i < count($users); $i++ )
                            <tr>
                                <input type="hidden" name="user_id[{{ $i }}]" value="{{ $users[$i] -> id }}">
                                <td style="padding:0;margin:0;">
                                    <input type="text" class="form-control"  value="{{ $users[$i] -> name }}" readonly>
                                </td>
                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="number" class="form-control" name="party[{{$i}}]" value="{{ $datas[$i] -> party }}">
                                @else
                                    <input type="number" class="form-control" name="party[{{$i}}]" value=0>
                                @endif
                                </td>
                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="number" class="form-control" name="times[{{$i}}]" value="{{ $datas[$i] -> times }}">
                                @else
                                    <input type="number" class="form-control" name="times[{{$i}}]" value=0>
                                @endif
                                </td>
                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="number" class="form-control" name="c_cost[{{$i}}]" value="{{ $datas[$i] -> c_cost }}">
                                @else
                                    <input type="number" class="form-control" name="c_cost[{{$i}}]" value=0>
                                @endif
                                </td>
                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="number" class="form-control" name="atbb[{{$i}}]" value="{{ $datas[$i] -> atbb }}">
                                @else
                                    <input type="number" class="form-control" name="atbb[{{$i}}]" value=0>
                                @endif
                                </td>
                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="number" class="form-control" name="atbb_customer[{{$i}}]" value="{{ $datas[$i] -> atbb_customer }}">
                                @else
                                    <input type="number" class="form-control" name="atbb_customer[{{$i}}]" value=0>
                                @endif
                                </td>
                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="number" class="form-control" name="regular[{{$i}}]" value="{{ $datas[$i] -> regular }}">
                                @else
                                    <input type="number" class="form-control" name="regular[{{$i}}]" value=0>
                                @endif
                                </td>
                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="number" class="form-control" name="other1[{{$i}}]" value="{{ $datas[$i] -> other1 }}">
                                @else
                                    <input type="number" class="form-control" name="other1[{{$i}}]" value=0>
                                @endif
                                </td>
                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="text" class="form-control" name="other1_remark[{{$i}}]" value="{{ $datas[$i] -> other1_remark }}">
                                @else
                                    <input type="text" class="form-control" name="other1_remark[{{$i}}]" value="">
                                @endif
                                </td>

                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="number" class="form-control" name="other2[{{$i}}]" value="{{ $datas[$i] -> other2 }}">
                                @else
                                    <input type="number" class="form-control" name="other2[{{$i}}]" value=0>
                                @endif
                                </td>
                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="text" class="form-control" name="other2_remark[{{$i}}]" value="{{ $datas[$i] -> other2_remark }}">
                                @else
                                    <input type="text" class="form-control" name="other2_remark[{{$i}}]" value="">
                                @endif
                                </td>

                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="number" class="form-control" name="other3[{{$i}}]" value="{{ $datas[$i] -> other3 }}">
                                @else
                                    <input type="number" class="form-control" name="other3[{{$i}}]" value=0>
                                @endif
                                </td>
                                <td style="padding:0;margin:0;">
                                @if(isset($datas[$i] -> id))
                                    <input type="text" class="form-control" name="other3_remark[{{$i}}]" value="{{ $datas[$i] -> other3_remark }}">
                                @else
                                    <input type="text" class="form-control" name="other3_remark[{{$i}}]" value="">
                                @endif
                                </td>



                            </tr>
                            @endfor


                            <tr><td colspan=13></td></tr>
                            <tr>
                                <td colspan=13 style="text-align:center;">
                                <input type="submit" class="btn btn-blue btn-md" value="登録">
                                </td>
                            </tr>
                            </form>
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
