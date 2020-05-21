@extends('layouts.c_data')

@section('content')

<div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper" style="margin:0">
      <!--BEGIN TITLE & BREADCRUMB PAGE-->
      <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
          <div class="page-header pull-left">
              <div class="page-title">
                  紹介管理</div>
          </div>
          <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{ route('getTop') }}">Home</a>&nbsp;&nbsp;<i
            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="{{ route('getCdata') }}">顧客管理TOP</a>&nbsp;&nbsp;<i
            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active"><a href="{{ route('c_data.create') }}">紹介管理</a></li>
          </ol>
          <div class="clearfix">
          </div>
      </div>
      <!--END TITLE & BREADCRUMB PAGE-->
      <!--BEGIN CONTENT-->
      <div class="page-content">
          <div id="tab-general">
              <div class="row row-height">
              <!-- 紹介者一覧 -->
                  <div class="col-md-3 col-md-offset-1">
                    <div class="panel panel-orange">
                        <div class="panel-heading">
                            紹介数一覧</div>
                        <div class="panel-body pan">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>名前</th>
                                        <th>紹介人数（累計）</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($resultArray as $ra)
                                    <tr>
                                        <td>{{ $ra['i_name'] }}</td>
                                        <td>{{ $ra['i_count'] }}人</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- ページネーション用link -->
                                <div class="d-flex justify-content-center">
                                </div>
                            <!-- endページネーション用link -->
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div><!--END PAGE WRAPPER-->
</div><!--END WRAPPER-->


@endsection
