@extends('layouts.root')

@section('content')

<div id="wrapper">
  @include('root.side_menu')
  <!--BEGIN PAGE WRAPPER-->
  <div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
      <div class="page-header pull-left">
        <div class="page-title"> 正規雇用賃金台帳</div>
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
            <div class="row">
              <!-- 個別売上配分表 -->
              <div class="panel panel-red">
                <div class="panel-heading">
                  @if($now_month == 1)
                  {{ $now_year - 1 }}年12月分({{ $now_year }}年{{ $now_month }}月25日払い)
                  @else
                  {{ $now_year }}年{{ $now_month - 1 }}月分({{ $now_year }}年{{ $now_month }}月25日払い)
                  @endif
                </div>
                <div class="panel-body">
                  <div class="table-wrapper">
                    

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>氏名</th>
                          
                            @for($i = 0; $i < count($users); $i++)
                              @if(isset($datas[$i]['array'][0]))
                              <tr>
                                <th>{{ $datas[$i]['name'] }}</th>
                                <th>{{ $datas[$i]['array'] }}</th>
                              </tr>
                              @else
                               <th>{{ $datas[$i]['name'] }}</th>
                              @endif
                            @endfor
                          
                        </tr>
                      </thead>

                      <tbody>

                        <tr>
                          <td>所定就労日</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="fixdWorkingDay" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>出勤日数</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="workingDayCount" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>欠勤日数</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="AbsenceDayCount" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>有給日数</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="paidHoliDayCount" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>特別休暇日数</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="specialHoliDayCount" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>所定労働時間</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="fixdWorkingTime" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>実労働時間</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="WorkingTime" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>有給残日数</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="paidHoliDayRemaining" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>欠勤基礎日数</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="basicAbsenceDayCount" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>出勤基礎日数</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="basicWorkingDayCount" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>役員報酬</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="remuneration" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>基本給(月給)</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="salary_month" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>基本給(時給)</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="salary_time" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>歩合給</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="commission" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>住宅手当</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="rent" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>前月未精算分</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="unpaid" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>資格手当</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="allowance" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>非課税通勤費</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="unCommutingExpenses" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>課税通勤費</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="commutingExpenses" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>個人立替経費</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="advanceExpenses" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>課税支給合計</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="taxableAmount" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                        <tr>
                          <td>非課税支給合計</td>
                          @for($i = 0; $i < count($users); $i++)
                            <td>
                              <input type="number" name="unTaxableAmount" class="contract_type">
                            </td>
                          @endfor
                        </tr>

                      </tbody>

                    </table>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
    <!--END CONTENT-->
    <!--END PAGE WRAPPER-->
  </div>
</div>


@endsection
