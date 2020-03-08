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
                        <th rowspan=3 id="fix1">氏名</th>
                        <th rowspan=3>所定就労日</th>
                        <th rowspan=3>出勤日</th>
                        <th rowspan=3>欠勤日</th>
                        <th rowspan=3>有給日数</th>
                        <th rowspan=3>特別休暇日数</th>
                        <th rowspan=3>所定労働時間</th>
                        <th rowspan=3>実働時間</th>
                        <th rowspan=3>有給残日数</th>
                        <th rowspan=3>欠勤基礎日数</th>
                        <th rowspan=3>出勤基礎日数</th>

                        <th rowspan=3>役員報酬</th>
                        <th rowspan=3>基本給(月給)</th>
                        <th rowspan=3>基本給(時給)</th>
                        <th rowspan=3>歩合給</th>
                        <th rowspan=3>住宅手当</th>
                        <th rowspan=3>前月未精算分</th>
                        <th rowspan=3>資格手当</th>
                        <th rowspan=3>非課税通勤費</th>
                        <th rowspan=3>課税通勤費</th>
                        <th rowspan=3>個人立替経費</th>
                        <th rowspan=3>課税支給合計</th>
                        <th rowspan=3>非課税支給合計</th>


                        <th rowspan=3>会社立替経費</th>
                        <th rowspan=3>事務委託</th>
                        <th rowspan=3>社宅<br>(会社負担分)</th>
                        <th rowspan=3>社会保険料<br>(会社負担分)</th>
                        <th rowspan=3>役員報酬</th>
                        <th rowspan=3>基本給</th>
                        <th rowspan=3>賞与</th>
                        <th rowspan=3>歩合</th>
                        <th rowspan=3>手当</th>
                        <th rowspan=3>課税支給合計</th>
                        <th rowspan=3>非課税<br>通勤手当</th>
                        <th rowspan=3>合計</th>
                        <th colspan=13>控除額内訳</th>
                        <th rowspan=3>差し引き支給額</th>
                      </tr>
                      <tr>
                        <th colspan=5>社会保険料(労務)</th>
                        <th rowspan=2>課税対象額</th>
                        <th colspan=6>その他控除</th>
                        <th rowspan=2>控除合計</th>
                      </tr>
                      <tr>
                        <th>健康保険</th>
                        <th>介護保険</th>
                        <th>厚生年金</th>
                        <th>雇用保険</th>
                        <th>小計</th>
                        <th>所得税</th>
                        <th>住民税</th>
                        <th>立替経費</th>
                        <th>年末調整</th>
                        <th>社宅</th>
                        <th>小計</th>
                      </tr>
                      </thead>

                      <tbody>
                        @for($i = 0; $i < count($users); $i++)
                        @if(isset($datas[$i]['array'][0]))
                        <tr>
                          <td>{{ $datas[$i]['name'] }}</td>
                          <td>{{ $datas[$i]['array'] }}</td>
                        </tr>
                        @else
                         @include('root.wageLedger.nodata')
                        @endif
                        @endfor

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
