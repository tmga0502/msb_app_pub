@extends('layouts.root')

@section('content')

<div id="wrapper">
  <!--BEGIN PAGE WRAPPER-->
  <div id="page-wrapper" style="margin:0;">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
      <div class="page-header pull-left">
        <div class="page-title">CSV登録・一覧</div>
      </div>
      <ol class="breadcrumb page-breadcrumb pull-right">
        <li>
            <a href="{{ route('getTop') }}">TOP</a>&nbsp;&nbsp;
            <i class="fa fa-angle-right"></i>&nbsp;&nbsp;
        </li>
        <li>
          <a href="{{ route('root.topPage') }}">報酬管理TOP</a>&nbsp;&nbsp;
          <i class="fa fa-angle-right"></i>&nbsp;&nbsp;
      </li>
        <li class="active">口座CSV登録</li>
      </ol>
      <div class="clearfix">
      </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
    <!--BEGIN CONTENT-->
    <div class="page-content">
      <!-- ファイル登録 -->
      <div class="row" style="margin-left:50px;margin-right:50px;">
        <div class="col-md-6">
          <div class="panel panel-yellow">
            <div class="panel-heading">CSV登録</div>
            <div class="panel-body">
              <form role="form" method="POST" action="{{ route('root.csv_upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12" style="margin-bottom:20px;">
                    <input type="file" id="file" name="file" class="form-control">
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="bank_number">
                        <option value="17">17口座</option>
                        <option value="19">19口座</option>
                        <option value="0">現金受領・紹介料</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <input type="submit" class="btn btn-blue btn-md" id="upload" value="登録">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- endファイル登録 -->

      <!-- 登録済み一覧テーブル -->
      <div class="row" style="margin-left:50px;margin-right:50px;">
        <div class="col-md-6">
          <div class="panel panel-red">
            <div class="panel-heading">過去分入金リスト</div>
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
                        @if($list->bank_number == 0)
                        <td>現or紹</td>
                        @else
                        <td>{{ $list->bank_number }}</td>
                        @endif
                        <td>{{ $list->year }}年{{ $list->month }}月</td>
                        <td style="text-align:center;">
                          <a href="{{ route('root.csv_backnumber', ['b_number' => $list->bank_number, 'year' => $list->year, 'month' => $list->month]) }}">
                            <input type="button" class="btn btn-blue btn-md" value="表示">
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
                <!-- ページネーション用link -->
                <div class="d-flex justify-content-center">
                    {{ $lists->links() }}
                </div>
                <!-- endページネーション用link -->
                @else
                <h3>まだCSVを登録していません</h3>
                @endif
              </div>
          </div>
        </div>
      </div>
      <!-- end登録済み一覧テーブル -->


    <!-- 一覧テーブル -->
    <div style="margin-top:50px">
      <!-- タブ -->
      <ul id="generalTab" class="nav nav-tabs responsive">
        <li class="active"><a href="#csv17_tub" data-toggle="tab">17口座</a></li>
        <li><a href="#csv19-tab" data-toggle="tab">19口座</a></li>
        <li><a href="#csv0-tab" data-toggle="tab">現金受領・紹介料</a></li>
      </ul>
      <!-- endタブ -->
      <form action="{{ route('root.update_csv') }}" method="POST" name="form1">
       @csrf
        <div id="generalTabContent" class="tab-content responsive">
          <div id="csv17_tub" class="tab-pane fade in active">
              @include('root.csvListTab.csv17')
          </div>

          <div id="csv19-tab" class="tab-pane fade">
            @include('root.csvListTab.csv19')
          </div>

          <div id="csv0-tab" class="tab-pane fade">
            @include('root.csvListTab.csv0')
          </div>

          <div class="text-center submit">
            <button type="submit" name="csv" class="btn-md btn-red">更新</button>
          </div>
        </div>
      </form>
    </div>

  </div>

  <!--END CONTENT-->
</div>
<!--END PAGE WRAPPER-->

@endsection
