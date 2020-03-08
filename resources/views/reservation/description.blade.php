@extends('layouts.reservation')

@section('content')

<div id="wrapper">
<!--BEGIN SIDEBAR MENU-->
@include('reservation.side_menu')
<!--END SIDEBAR MENU-->
  <div id="page-wrapper">
    <div class="page-content">
      <div class="row">
        <div class="col-lg-6">
          <div class="col-md-12 col-sm-12">

              <!-- start 予定詳細 -->
              <div class="panel panel-grey">
                  <div class="panel-heading">予定詳細</div>
                    <div class="panel-body">
                      <table class="table table-hover">
                        <tbody style="text-align:center">
                        <!-- 変更用form -->
                          <form action="{{ route('r_update', ['id' => $context->id]) }}" method='post'>
                              @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="originallyID" value="{{ $context->id }}">
                            <tr class="">
                            <!-- 設備 -->
                              <td class="col-sm-4">設備</td>
                              <td class="col-sm-8">
                                <select class="" name='space_name'>
                                  @if($context->space_name == 'Aスペース')
                                    <option value="Aスペース" selected>Aスペース</option>
                                  @else
                                    <option value="Aスペース">Aスペース</option>
                                  @endif
                                  @if($context->space_name == 'Bスペース')
                                    <option value="Bスペース" selected>Bスペース</option>
                                  @else
                                    <option value="Bスペース">Bスペース</option>
                                  @endif
                                  @if($context->space_name == 'Cスペース')
                                    <option value="Cスペース" selected>Cスペース</option>
                                  @else
                                    <option value="Cスペース">Cスペース</option>
                                  @endif
                                  @if($context->space_name == '印鑑')
                                    <option value="印鑑" selected>印鑑</option>
                                  @else
                                    <option value="印鑑">印鑑</option>
                                  @endif
                                </select>
                              </td>
                            </tr>
                            <!-- 用途 -->
                            <tr class="">
                                <td class="col-sm-4">用途</td>
                                <td class="col-sm-8">
                                  <select class="" name='purpose'>
                                  @if($context->purpose == 'ヒアリング')
                                    <option value="ヒアリング" selected>ヒアリング</option>
                                  @else
                                    <option value="ヒアリング">ヒアリング</option>
                                  @endif
                                  @if($context->purpose == '契約')
                                    <option value="契約" selected>契約</option>
                                  @else
                                    <option value="契約">契約</option>
                                  @endif
                                  @if($context->purpose == '鍵渡し')
                                    <option value="鍵渡し" selected>鍵渡し</option>
                                  @else
                                    <option value="鍵渡し">鍵渡し</option>
                                  @endif
                                  @if($context->purpose == '業者対応')
                                    <option value="業者対応" selected>業者対応</option>
                                  @else
                                    <option value="業者対応">業者対応</option>
                                  @endif
                                  @if($context->purpose == 'MTG')
                                    <option value="MTG" selected>MTG</option>
                                  @else
                                    <option value="MTG">MTG</option>
                                  @endif
                                  @if($context->purpose == '決済')
                                    <option value="決済" selected>決済</option>
                                  @else
                                    <option value="決済">決済</option>
                                  @endif
                                </select>
                                </td>
                            </tr>
                            <!-- 詳細 -->
                            <tr class="">
                                <td class="col-sm-4">詳細</td>
                                <td class="col-sm-8">
                                <input type="text" name="description"　 style="width:100%" value="{{ $context->description }}">
                                </td>
                            </tr>
                            <!-- 日付 -->
                            <tr class="">
                                <td class="col-sm-4">日付</td>
                                <td class="col-sm-8">
                                    <select name="create_year">
                                    @for ($i = 0; $i < 10; $i++)
                                      @if (2019 + $i == substr($context->date, 0, 4))
                                        <option value="{{ 2019 + $i }}" selected>{{ 2019 + $i }}</option>
                                      @else
                                        <option value="{{ 2019 + $i }}">{{ 2019 + $i }}</option>
                                      @endif
                                    @endfor
                                    </select>
                                    年
                                    <select name="create_month">
                                    @for ($i = 1; $i < 13; $i++)
                                      @if ($i == substr($context->date, 5, 7))
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                      @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                      @endif
                                    @endfor
                                    </select>
                                    月
                                    <select name="create_day">
                                    @for ($i = 1; $i < 32; $i++)
                                      @if ($i == substr($context->date, 8, 10))
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                      @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                      @endif
                                    @endfor
                                    </select>
                                    日
                                </td>
                            </tr>
                            <!-- end日付 -->

                            <!-- 開始時間 -->
                            <tr class="">
                                <td class="col-sm-4">開始</td>
                                <td class="col-sm-8">
                                  <select name="start_hour">
                                    @for ($i = 7; $i < 24; $i++)
                                      @if ($i == substr($context->start_time, 0, 2))
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                      @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                      @endif
                                    @endfor
                                  </select>
                                  時
                                  <select name="start_minutes">
                                    @for ($i = 0; $i < 46; $i = $i+15)
                                      @if ($i == substr($context->start_time, 3, 2))
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                      @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                      @endif
                                    @endfor
                                  </select>
                                  分
                                </td>
                            </tr>
                            <tr class="">
                                <td class="col-sm-4">終了</td>
                                <td class="col-sm-8">
                                  <select name="end_hour">
                                    @for ($i = 7; $i < 24; $i++)
                                      @if ($i == substr($context->end_time, 0, 2))
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                      @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                      @endif
                                    @endfor
                                  </select>
                                  時
                                  <select name="end_minutes">
                                    @for ($i = 0; $i < 46; $i = $i+15)
                                      @if ($i == substr($context->end_time, 3, 2))
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                      @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                      @endif
                                    @endfor
                                  </select>
                                  分
                                </td>
                            </tr>
                        </tbody>
                      </table>
                      <br><br><br>
                      <!-- エラー表示 -->
                        @if($errors->any())
                            <div style="color:red;">
                                【エラー】<br><br>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                            <br>
                        @endif
                          <div class="col-sm-6" style="text-align:center;">
                              <input type="submit" value="変更する" class="btn btn-info">
                          </div>
                      </form>
                      <!-- end変更用form -->
                          <div class="col-sm-6" style="text-align:center;">
                            <form action="{{ route('r_remove', ['id' => $context->id]) }}" method='post'>
                              @csrf
                              <input type="submit" value="削除する" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">
                            </form>
                          </div>
                    </div>
                      </div>
              </div><!-- end col-md-5 col-sm-12 -->
              <!-- end 予定詳細 -->


        </div><!-- end col-lg-6 -->


      </div><!-- end row -->
    </div><!-- end page-content -->
  </div><!-- end page-wrapper -->
</div><!-- end wrapper -->


@endsection
