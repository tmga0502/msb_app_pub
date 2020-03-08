@extends('layouts.reservation')

@section('content')

<div id="wrapper">
<!--BEGIN SIDEBAR MENU-->
@include('reservation.side_menu')
<!--END SIDEBAR MENU-->
<div id="page-wrapper">
  <div class="page-content">
      <div class="row">
        <div class="col-lg-12">
                <div class="panel panel-red">
                  <!-- 予約一覧 -->
                    <div class="panel-heading">{{ Auth::user()->name }}'s&nbsp;予約一覧&nbsp;&nbsp;
                      <span style="font-size:14px;">※{{$dt->format('m月d日')}}以降分</span>
                    </div>
                    <div class="panel-body">

                    <table class="table table-hover">
                      <thead>
                          <tr class="active">
                            <th class="col-sm-2" style="text-align:center">日付</th>
                            <th class="col-sm-1" style="text-align:center">開始時刻</th>
                            <th class="col-sm-1" style="text-align:center">終了時刻</th>
                            <th class="col-sm-1" style="text-align:center">目的</th>
                            <th class="col-sm-4" style="text-align:center">詳細</th>
                            <th class="col-sm-1" style="text-align:center">スペース</th>
                            <th class="col-sm-1"></th>
                          </tr>
                      </thead>
                      <tbody style="text-align:center">
                          @foreach($userSchedule as $us)
                          <tr class="active">
                            <td class="col-sm-2">{{ $us['date'] }}</td>
                            <td class="col-sm-1">{{ substr($us['start_time'], 0, 5) }}</td>
                            <td class="col-sm-1">{{ substr($us['end_time'], 0, 5) }}</td>
                            <td class="col-sm-1">{{ $us['purpose'] }}</td>
                            <td class="col-sm-4" style="text-align:left">{{ $us['description'] }}</td>
                            <td class="col-sm-1">{{ $us['space_name'] }}</td>
                            <td class="col-sm-1"><a href="https://msbyapp.skr.jp/reserve_description/{{ $us['id'] }}">
                              <button class="btn btn-info btn-xs">編集ページヘ</button>
                            </a></td>
                          </tr>
                          @endforeach

                      </tbody>
                      </form>
                    </table>

                      <!-- ページネーション用link -->
                        <div class="d-flex justify-content-center">
                            {{ $userSchedule->links() }}
                        </div>
                      <!-- endページネーション用link -->

                    </div>
                </div>
                <!-- end予約一覧 -->


        </div>
      </div>
  </div>
</div>


</div>

@endsection
