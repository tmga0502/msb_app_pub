@extends('layouts.commissions')

@section('content')

<!-- js洋配列の作成と埋め込み -->

<!-- <div id="csvArray" data-array="{{ print_r($jsArray) }}"></div> -->
<?php $csvArray=json_encode($jsArray); ?>

<div id="wrapper">
  @include('commissions.side_menu')
  <!--BEGIN PAGE WRAPPER-->
  <div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
      <div class="page-header pull-left">
        <div class="page-title"> 19口座入金チェック</div>
      </div>
      <div class="clearfix">
      </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
    <!--BEGIN CONTENT-->
    <div class="page-content">
      <div id="tab-general">
        <div id="sum_box" class="row mbl">
          <!-- 検索ナビ -->
          <div class="col-lg-12">
            <div class="row">
              <nav role="navigation" class="navbar navbar-default">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <a class="navbar-brand">検索</a></div>
                  <div id="bs-example-navbar-collapse-2" class="collapse navbar-collapse">
                    <form action="{{ route('commissions.searchCSV19') }}" method="POST" role="search" class="navbar-form navbar-left">
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


          <!-- 入金チェック -->
          <div class="col-lg-12">
            <div class="row">
              <div class="panel panel-green">
                <div class="panel-heading">
                  {{ $now_year }}年{{ $now_month }}月分入金チェック
                </div>
                <div class="panel-body">

                  <!-- <div class="table-wrapper"> -->
                  <table class="table table-hover table-borde table-sm">
                    <thead>
                      <tr>
                        <th>入金日</th>
                        <th>摘要</th>
                        <th>入金額</th>
                        <th>名目</th>
                        <th>担当</th>
                        <th style="white-space: nowrap;">提供サービス</th>
                        <th>備考</th>
                      </tr>
                    </thead>
                    <tbody>

                      <form action="{{ route('commissions.update_csv19') }}" method="POST" name="form1">
                        @csrf
                        @if($now_month == 1)
                        <input type="hidden" name="year" value="{{ $now_year - 1 }}">
                        <input type="hidden" name="month" value="12">
                        <input type="hidden" name="day" value="{{ $now_day }}">
                        @else
                        <input type="hidden" name="year" value="{{ $now_year }}">
                        <input type="hidden" name="month" value="{{ $now_month }}">
                        <input type="hidden" name="day" value="{{ $now_day }}">
                        @endif
                        @foreach( $csvDatas as $csv )
                        <tr>
                          <input type="hidden" name="id[{{ $csv['id'] }}]" value="{{ $csv['id'] }}">
                          <!-- 入金日 -->
                          <td>
                            @if($csv['month'] < 10 and $csv['day'] < 10 )
                              <input type="date" style="border:0px;" name="date[{{ $csv['id'] }}]" value="{{ $csv['year'] . '-0' . $csv['month'] . '-0' . $csv['day']}}" readonly>
                            @elseif($csv['day'] < 10)
                              <input type="date" style="border:0px;" name="date[{{ $csv['id'] }}]" value="{{ $csv['year'] . '-' . $csv['month'] . '-0' . $csv['day']}}" readonly>
                            @else
                              <input type="date" style="border:0px;" name="date[{{ $csv['id'] }}]" value="{{ $csv['year'] . '-' . $csv['month'] . '-' . $csv['day']}}" readonly>
                            @endif
                          </td>
                          <td style="text-align:left;">{{ $csv['name'] }}</td>
                          <!-- 金額 -->
                          <td>
                            <input type="text" style="text-align:right;" name="price[{{ $csv['id'] }}]" value="{{ number_format($csv['price']) }}" readonly>
                          </td>
                          <!-- 名目 -->
                          <td>
                            @if(Auth::user()->superUser === 1)
                              <select class="form-control nominal sbChange" name="nominal[{{ $csv['id'] }}]">
                                @for($i=0; $i < count($nominal);$i++)
                                @if($csv['nominal']==$nominal[$i])
                                  <option value="{{ $nominal[$i] }}" selected>{{ $nominal[$i] }}</option>
                                @else
                                  <option value="{{ $nominal[$i] }}">{{ $nominal[$i] }}</option>
                                @endif
                                @endfor
                              </select>
                            @elseif($csv['nominal'] == '' ||$csv['person'] == '---')
                            <select class="form-control nominal sbChange" name="nominal[{{ $csv['id'] }}]">
                              @for($i=0; $i < count($nominal);$i++)
                              @if($csv['nominal']==$nominal[$i])
                               <option value="{{ $nominal[$i] }}">{{ $nominal[$i] }}</option>
                              @else
                                <option value="{{ $nominal[$i] }}">{{ $nominal[$i] }}</option>
                              @endif
                              @endfor
                            </select>
                            @elseif($csv['person'] == $user_name ||$csv['person'] == '')
                            <select class="form-control nominal sbChange" name="nominal[{{ $csv['id'] }}]">
                              @for($i=0; $i < count($nominal);$i++)
                              @if($csv['nominal']==$nominal[$i])
                                <option value="{{ $nominal[$i] }}" selected>{{ $nominal[$i] }}</option>
                              @else
                                <option value="{{ $nominal[$i] }}">{{ $nominal[$i] }}</option>
                              @endif
                              @endfor
                            </select>
                            @else
                            <input type="text" class="form-control" name="nominal[{{ $csv['id'] }}]" value="{{ $csv['nominal'] }}" readonly>
                            @endif
                          </td>
                          <!-- end名目 -->

                          <!-- 担当者名 -->
                          <td>
                            @if(Auth::user()->superUser === 1)
                            <select class="form-control" name="person[{{ $csv['id'] }}]">
                              <option value="---">---</option>
                              @for($i=0; $i < count($userList);$i++)
                                @if($userList[$i] == $csv['person'])
                                <option value="{{ $userList[$i] }}" selected>{{ $userList[$i] }}</option>
                                @else
                                <option value="{{ $userList[$i] }}" >{{ $userList[$i] }}</option>
                                @endif
                              @endfor
                            </select>
                            @elseif($csv['person'] == '---')
                            <select class="form-control" name="person[{{ $csv['id'] }}]">
                              <option value="---">---</option>
                              <option value="{{ $user_name }}">{{ $user_name}}</option>
                            </select>
                            @elseif($csv['person'] == $user_name)
                            <select class="form-control" name="person[{{ $csv['id'] }}]">
                              <option value="---">---</option>
                              <option value="{{ $user_name }}" selected>{{ $user_name}}</option>
                            </select>
                            @else
                            <input type="text" class="form-control" name="person[{{ $csv['id'] }}]" value="{{ $csv['person'] }}" readonly>
                            @endif
                          </td>
                          <!-- end担当者名 -->

                          <!-- 提供サービス -->
                          <td style="white-space: nowrap;">
                            @if(Auth::user()->superUser === 1)
                            <select class="form-control" name="service[{{ $csv['id'] }}]">
                              @for($i=0; $i < count($service);$i++) @if($csv['service']==$service[$i]) <option value="{{ $service[$i] }}" selected>{{ $service[$i] }}</option>
                                @else
                                <option value="{{ $service[$i] }}">{{ $service[$i] }}</option>
                                @endif
                                @endfor
                            </select>
                            @elseif($csv['service'] == '' ||$csv['person'] == '---')
                            <select class="form-control" name="service[{{ $csv['id'] }}]">
                              @for($i=0; $i < count($service);$i++) @if($csv['service']==$service[$i]) <option value="{{ $service[$i] }}">{{ $service[$i] }}</option>
                                @else
                                <option value="{{ $service[$i] }}">{{ $service[$i] }}</option>
                                @endif
                                @endfor
                            </select>
                            @elseif($csv['person'] == $user_name ||$csv['person'] == '')
                            <select class="form-control" name="service[{{ $csv['id'] }}]">
                              @for($i=0; $i < count($service);$i++) @if($csv['service']==$service[$i]) <option value="{{ $service[$i] }}" selected>{{ $service[$i] }}</option>
                                @else
                                <option value="{{ $service[$i] }}">{{ $service[$i] }}</option>
                                @endif
                                @endfor
                            </select>
                            @else
                            <input type="text" class="form-control" name="service[{{ $csv['id'] }}]" value="{{ $csv['service'] }}" readonly>
                            @endif
                          </td>
                          <!-- end提供サービス -->

                          <!-- 備考 -->
                          <td style="padding:0;margin:0;">
                            @if(Auth::user()->superUser === 1)
                            <textarea class="form-control" name="remark[{{ $csv['id'] }}]">{{ $csv['remark'] }}</textarea>
                            @elseif($csv['remark'] == '')
                            <textarea class="form-control" name="remark[{{ $csv['id'] }}]"></textarea>
                            @elseif($csv['nominal'] == '契約金等')
                            <textarea class="form-control" name="remark[{{ $csv['id'] }}]" readonly>{{ $csv['remark'] }}</textarea>
                            @elseif($csv['person'] == $user_name)
                            <textarea class="form-control" name="remark[{{ $csv['id'] }}]">{{ $csv['remark'] }}</textarea>
                            @else
                            <textarea class="form-control" name="remark[{{ $csv['id'] }}]" readonly>{{ $csv['remark'] }}</textarea>
                            @endif
                          </td>
                          <!-- end備考 -->
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan=9>
                            <div class="text-center submit">
                              <button type="submit" name="csv" class="btn-sm btn-red">更新</button>
                            </div>
                          </td>
                        </tr>
                      </form>
                    </tbody>
                </div>
                </table>
                <!-- </div> -->
              </div>
            </div>
          </div>
        </div>
        <!-- end入金チェック -->

      </div>
    </div>
  </div>
  <!--END CONTENT-->
  <!--END PAGE WRAPPER-->
</div>
</div>


<!-- モーダルウインド -->
<div id="div4" style="display:none;">
<p id="p1"></p>
契約金　　：<input type="number" id="input1" size="10" maxlength="10" style="text-align:right;">円<br><br>
仲介手数料：<input type="number" id="input2" size="10" maxlength="10" style="text-align:right;">円<br><br>
その他　　：<input type="number" id="input3" size="10" maxlength="10" style="text-align:right;">円<br><br>
差額　　　：<input type="number" id="input4" size="10" maxlength="10" style="text-align:right;" readonly>円
<p id="p2" style="color:red;"></p>
</div>

@endsection
