@extends('layouts.c_data')

@section('content')

<div id="wrapper">
    @include('c_data.side_menu')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title"> Dashboard</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
              <li>
                <a href="{{ route('getTop') }}">TOP</a>&nbsp;&nbsp;
                <i class="fa fa-angle-right"></i>&nbsp;&nbsp;
              </li>
              <li class="active">顧客管理表Home</li>
            </ol>
            <div class="clearfix">
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-3">
                          <div class="panel profit db mbm">
                              <div class="panel-body">
                                  <p class="icon">
                                      <i class="icon fa fa-money"></i>
                                  </p>
                                  <h4 class="value">
                                  <!-- ここ↓ -->
                                    <span>¥</span></h4>
                                  <p class="description">
                                      必達目標</p>
                                  <div class="progress progress-sm mbn">
                                      <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;" class="progress-bar progress-bar-success">
                                      <!-- ここ↓ -->
                                          <span class="sr-only">80% Complete </span></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="panel income db mbm">
                              <div class="panel-body">
                                  <p class="icon">
                                      <i class="icon fa fa-bar-chart-o"></i>
                                  </p>
                                  <!-- ここ↓ -->
                                  <h4 class="value">
                                      <span>％</span></h4>
                                  <p class="description">
                                      必達達成率</p>
                                  <div class="progress progress-sm mbn">
                                  <!-- ここ↓ -->
                                      <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 10%;" class="progress-bar progress-bar-red">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="panel income db mbm">
                              <div class="panel-body">
                                  <p class="icon">
                                      <i class="icon fa fa-money"></i>
                                  </p>
                                  <!-- ここ↓ -->
                                  <h4 class="value">
                                      <span>¥</span></h4>
                                  <p class="description">
                                      ストレッチ目標</p>
                                  <div class="progress progress-sm mbn">
                                      <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;" class="progress-bar progress-bar-info">
                                      <!-- ここ↓ -->
                                          <span class="sr-only">60% Complete </span></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="panel income db mbm">
                              <div class="panel-body">
                                  <p class="icon">
                                      <i class="icon fa fa-bar-chart-o"></i>
                                  </p>
                                  <!-- ここ↓ -->
                                  <h4 class="value">
                                      <span>％</span></h4>
                                  <p class="description">
                                      ストレッチ達成率</p>
                                  <div class="progress progress-sm mbn">
                                      <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:0%;" class="progress-bar progress-bar-warning">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <!-- Todoリスト -->
                        <div class="col-md-8">
                            <div class="portlet box">
                                <div class="portlet-header" style="background-color:lightcoral;">
                                    <div class="caption" style="color:white;">Todo List</div>
                                </div>
                                <form action=""  method="post" >
                                    @csrf
                                    <!-- <div class="text"> -->
                                    <!-- ここ↓ -->
                                      <input type="hidden" name="user_id" value="<!-- ここ↓ -->">

                                            <button type="submit" name="new" class="button" style="float:right;">
                                                ToDo追加
                                            </button>
                                    <!-- </div> -->
                                </form>
                                <div style="overflow: hidden;" class="portlet-body">
                                    <ul class="todo-list sortable" id="jquery-ui-sortable">
                                    <!-- ここ↓ -->
                                       <!-- ここ↓ for -->
                                        <li class="clearfix" id=""><span class="drag-drop"><i></i></span>
                                        <!-- ここ↓ -->
                                            <div class="todo-title">
                                              &#11;&#11;&#11;&#11;</div>
                                            <form action=""  method="post" >
                                                @csrf
                                            <div class="todo-actions pull-right clearfix">
                                            <!-- ここ↓ -->
                                              <button type="submit" name="del" value=""><i class="fa fa-trash-o"></i></button>
                                            </div>
                                            </form>
                                        </li>
                                        <!-- ここ↓ end for-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                      <!-- 解約3ヶ月前 -->
                        <div class="col-md-4">
                          <div class="portlet box">
                              <div class="portlet-header" style="background-color:lawngreen;">
                                  <div class="caption" style="color:white;">解約3ヶ月前</div>
                              </div>
                              <table class="table table-bordered">
                                <tr>
                                  <th style="text-align:center;">一覧</th>
                                </tr>
                                <!-- ここ↓  for-->
                                <tr>
                                  <td style="text-align:center;">
                                    <a href="{% url 'c_data:detail' pk=user.id CustomerData_id=key %}">
                                    <!-- ここ -->
                                    </a>
                                  </td>
                                </tr>
                                <!-- ここ↓ @end for-->
                              </table>
                          </div>
                        <!-- 今月誕生日 -->
                          <div class="portlet box">
                              <div class="portlet-header" style="background-color:royalblue;">
                                  <div class="caption" style="color:white;">誕生日</div>
                              </div>
                              <table class="table table-bordered">
                                <th colspan=2 style="text-align:center;">入居者</th>
                                <tr>
                                  <th style="text-align:center;">名前</th>
                                  <th style="text-align:center;">誕生日</th>
                                </tr>
                                <!-- ここ↓  for-->
                                <tr>
                                  <td>
                                    <a href="{% url 'c_data:detail' pk=user.id CustomerData_id=c.id %}">
                                      <!-- ここ↓ -->
                                    </a>
                                  </td>
                                  <td>
                                    <a href="{% url 'c_data:detail' pk=user.id CustomerData_id=c.id %}">
                                      <!-- ここ↓ -->
                                    </a>
                                  </td>
                                </tr>
                                <!-- ここ end if -->
                                <!-- ここ  for -->
                                <th colspan=2 style="text-align:center;">パートナー</th>
                                <!-- ここ  for -->
                                <tr>
                                  <td>
                                    <a href="{% url 'c_data:detail' pk=user.id CustomerData_id=p.id %}">
                                      <!-- ここ↓ -->
                                    </a>
                                  </td>
                                  <td>
                                    <a href="{% url 'c_data:detail' pk=user.id CustomerData_id=p.id %}">
                                    <!-- ここ↓ -->
                                    </a>
                                  </td>
                                </tr>
                                <!-- ここ end for -->
                                <!-- ここ end if -->

                                <!-- ここ  if -->
                                <th colspan=2 style="text-align:center;">お子様</th>
                                <!-- ここ  for -->
                                <tr>
                                  <td>
                                    <a href="{% url 'c_data:detail' pk=user.id CustomerData_id=ch1.id %}">
                                      <!-- ここ↓ -->
                                    </a>
                                  </td>
                                  <td>
                                    <a href="{% url 'c_data:detail' pk=user.id CustomerData_id=ch1.id %}">
                                      <!-- ここ↓ -->
                                    </a>
                                  </td>
                                </tr>
                                <!-- ここ end for -->
                                <!-- ここ end if -->

                                <!-- ここ  if -->
                                <th colspan=2 style="text-align:center;">お子様</th>
                                <!-- ここ  for -->
                                <tr>
                                  <td>
                                    <a href="{% url 'c_data:detail' pk=user.id CustomerData_id=ch2.id %}">
                                      <!-- ここ↓ -->
                                    </a>
                                  </td>
                                  <td>
                                    <a href="{% url 'c_data:detail' pk=user.id CustomerData_id=ch2.id %}">
                                      <!-- ここ↓ -->
                                    </a>
                                  </td>
                                </tr>
                                <!-- ここ end for -->
                                <!-- ここ end if -->

                              </table>
                          </div>
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
