@extends('layouts.c_data')

@section('content')

<div id="wrapper">
    @include('c_data.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
      <!--BEGIN TITLE & BREADCRUMB PAGE-->
      <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
          <div class="page-header pull-left">
              <div class="page-title">
                  紹介管理</div>
          </div>
          <ol class="breadcrumb page-breadcrumb pull-right">
              <li><i class="fa fa-home"></i>&nbsp;<a href="{{ route('c_data.top') }}">Home</a>&nbsp;&nbsp;<i
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
              <div class="row mbl">
                  <div class="col-md-12">
                      <div class="col-md-12">
                          <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4 col-md-offset-4">
                      <div class="row">
                        <div class="panel panel-orange">
                            <div class="panel-heading">
                                紹介者一覧</div>
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
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div><!--END CONTENT-->
    </div><!--END PAGE WRAPPER-->
</div><!--END WRAPPER-->


@endsection
