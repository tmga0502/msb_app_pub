<!-- 【未登録】個別売上配分表 -->

<div class="panel panel-violet">
      <div class="panel-heading">
          @if($now_month == 1)
          {{ $now_year - 1 }}年12月分
          @else
          {{ $now_year }}年{{ $now_month - 1 }}月分
          @endif
      </div>
      <div class="panel-body">

        <div class="table-wrapper">
        <!-- 行追加ボタン -->
        <!-- <button type="btn" class="btn-sm btn-green" onclick="addTableRow();">＋行を追加</button> -->
        <!-- end行追加ボタン -->
          <table class="table table-hover table-bordered" id='registrationTable'>
            <form action="{{ route('commissions.other_create') }}" method="POST">
            <input type="hidden" name="dataCount" value="{{count($csvDatas)}}">
            <input type="hidden" name="userCount" value="{{count($userList)}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->name}}">
            @csrf
              <thead>
                  <tr>
                      <th>成約者(買主)</th>
                      <th>成約者(売主)</th>
                      <!-- <th style="white-space:nowrap;">提供サービス</th> -->
                      <th>適用</th>
                      <th>物件名</th>
                      <th>号室</th>
                      <th>管理会社</th>
                      <th>仲介手数料</th>
                      <th>入金日</th>
                      <th>広告料</th>
                      <th>入金日</th>
                      <th>業務委託料</th>
                      <th>入金日</th>
                      <th>外部報酬料</th>
                      <th style="white-space:nowrap;">提供サービス</th>
                      <th>新or旧</th>
                      <th colspan=2 style="white-space:nowrap;">レート上限</th>
                      @foreach( $userList as $user)
                      <th colspan=4 style="text-align:center;">{{$user}}</th>
                      @endforeach
                      <th colspan=4 style="text-align:center;">会社</th>
                      <th>備考</th>
                  </tr>
              </thead>
              <tbody>
              @for( $i = 1; $i < count($csvDatas) + 1; $i++)
              <!-- $csvDatasのid -->
              <input type="hidden" name="csv_id[{{$i}}]" value="{{ $csvDatas[$i-1]->id }}">
                <tr>
                <!-- 買主名 -->
                  <td>
                    <input type="text" name="customer_name[{{$i}}]" value="{{ $csvDatas[$i-1]->commissions->customer_name }}">
                  </td>

                <!-- 売主名 -->
                  <td>
                    <input type="text" name="seller_name[{{$i}}]" value="{{ $csvDatas[$i-1]->commissions->seller_name }}">
                  </td>

                <!-- 振り込み名 -->
                  <td style="white-space:nowrap;">
                    {{ $csvDatas[$i-1]->name }}
                  </td>

                <!-- 物件名 -->
                  <td>
                    <input id="apartmentName" type="text" name="apartment_name[{{$i}}]" value="{{ $csvDatas[$i-1]->commissions->apartment_name }}">
                  </td>

                <!-- 部屋番号 -->
                  <td>
                    <input id="" type="text" name="room[{{$i}}]" value="{{ $csvDatas[$i-1]->commissions->room }}">
                  </td>

                <!-- 管理会社名 -->
                  <td>
                    <input id="" type="text" name="company[{{$i}}]" value="{{ $csvDatas[$i-1]->commissions->company }}">
                  </td>

                  <!-- 仲手とADの振り分け -->
                  @if($csvDatas[$i-1]->nominal == '仲介手数料')
                  <td>
                    <input id="" type="text" name="brokerage_fee[{{$i}}]" style="text-align:right;width:100px;" value="{{ number_format($csvDatas[$i-1]->price) }}" readonly>
                  </td>
                  <td style="white-space:nowrap;">
                    @if($csvDatas[$i-1]->month < 10 and $csvDatas[$i-1]->day < 10 )
                    <input class="form-control" type="date" name="b_fee_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-0' . $csvDatas[$i-1]->month . '-0' . $csvDatas[$i-1]->day }}" readonly>
                    @elseif($csvDatas[$i-1]->day < 10)
                    <input class="form-control" type="date" name="b_fee_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-' . $csvDatas[$i-1]->month . '-0' . $csvDatas[$i-1]->day }}" readonly>
                    @else
                    <input class="form-control" type="date" name="b_fee_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-' . $csvDatas[$i-1]->month . '-' . $csvDatas[$i-1]->day }}" readonly>
                    @endif
                  </td>
                  <td>
                    <input id="" type="text" name="advertising_fee[{{$i}}]" style="text-align:right;width:100px;" value="0" readonly>
                  </td>
                  <td>
                    <input class="form-control" type="date" name="ad_date[{{$i}}]" value=null readonly>
                  </td>
                  <td>
                    <input id="" type="text" name="outsourcing_fee[{{$i}}]" style="text-align:right;width:100px;" value="0" readonly>
                  </td>
                  <td>
                    <input class="form-control" type="date" name="o_fee_date[{{$i}}]" value=null readonly>
                  </td>

                  @elseif($csvDatas[$i-1]->nominal == '広告料')
                  <td>
                    <input id="" type="text" name="brokerage_fee[{{$i}}]" style="text-align:right;width:100px;" value="0" readonly>
                  </td>
                  <td>
                    <input class="form-control" type="date" name="b_fee_date[{{$i}}]" value=null readonly>
                  </td>
                  <td>
                    <input id="" type="text" name="advertising_fee[{{$i}}]" style="text-align:right;width:100px;" value="{{ number_format($csvDatas[$i-1]->price) }}" readonly>
                  </td>
                  <td>
                    @if($csvDatas[$i-1]->month < 10 and $csvDatas[$i-1]->day < 10 )
                    <input class="form-control" type="date" name="ad_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-0' . $csvDatas[$i-1]->month . '-0' . $csvDatas[$i-1]->day }}" readonly>
                    @elseif($csvDatas[$i-1]->day < 10)
                    <input class="form-control" type="date" name="ad_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-' . $csvDatas[$i-1]->month . '-0' . $csvDatas[$i-1]->day }}" readonly>
                    @else
                    <input class="form-control" type="date" name="ad_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-' . $csvDatas[$i-1]->month . '-' . $csvDatas[$i-1]->day }}" readonly>
                    @endif
                  </td>
                  <td>
                    <input id="" type="text" name="outsourcing_fee[{{$i}}]" style="text-align:right;width:100px;" value="0" readonly>
                  </td>
                  <td>
                    <input class="form-control" type="date" name="o_fee_date[{{$i}}]" value=null readonly>
                  </td>

                  @elseif($csvDatas[$i-1]->nominal == '契約金等')
                  <td style="background-color: yellow;">
                    <span style="font-size:10px; color:red;">※要入力</span><br>
                    <input type="text" name="brokerage_fee[{{$i}}]" style="text-align:right;width:100px;" value="0" >
                  </td>
                  <td style="white-space:nowrap;">
                    @if($csvDatas[$i-1]->month < 10 and $csvDatas[$i-1]->day < 10 )
                    <input class="form-control" type="date" name="b_fee_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-0' . $csvDatas[$i-1]->month . '-0' . $csvDatas[$i-1]->day }}" readonly>
                    @elseif($csvDatas[$i-1]->day < 10)
                    <input class="form-control" type="date" name="b_fee_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-' . $csvDatas[$i-1]->month . '-0' . $csvDatas[$i-1]->day }}" readonly>
                    @else
                    <input class="form-control" type="date" name="b_fee_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-' . $csvDatas[$i-1]->month . '-' . $csvDatas[$i-1]->day }}" readonly>
                    @endif
                  </td>
                  <td style="background-color: yellow;">
                    <span style="font-size:10px; color:red;">※要入力</span><br>
                    <input id="" type="text" name="advertising_fee[{{$i}}]" style="text-align:right;width:100px;" value="0" >
                  </td>
                  <td>
                    @if($csvDatas[$i-1]->month < 10 and $csvDatas[$i-1]->day < 10 )
                    <input class="form-control" type="date" name="ad_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-0' . $csvDatas[$i-1]->month . '-0' . $csvDatas[$i-1]->day }}" readonly>
                    @elseif($csvDatas[$i-1]->day < 10)
                    <input class="form-control" type="date" name="ad_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-' . $csvDatas[$i-1]->month . '-0' . $csvDatas[$i-1]->day }}" readonly>
                    @else
                    <input class="form-control" type="date" name="ad_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-' . $csvDatas[$i-1]->month . '-' . $csvDatas[$i-1]->day }}" readonly>
                    @endif
                  </td>
                  <td>
                    <input id="" type="text" name="outsourcing_fee[{{$i}}]" style="text-align:right;width:100px;" value="0" readonly>
                  </td>
                  <td>
                    <input class="form-control" type="date" name="o_fee_date[{{$i}}]" value=null readonly>
                  </td>

                  @elseif($csvDatas[$i-1]->nominal == '紹介料')

                  <td>
                    <input id="" type="text" name="brokerage_fee[{{$i}}]" style="text-align:right;width:100px;" value="0" readonly>
                  </td>
                  <td>
                    <input class="form-control" type="date" name="b_fee_date[{{$i}}]" value=null readonly>
                  </td>
                  <td>
                    <input id="" type="text" name="advertising_fee[{{$i}}]" style="text-align:right;width:100px;" value="0" readonly>
                  </td>
                  <td>
                    <input class="form-control" type="date" name="ad_date[{{$i}}]" value=null readonly>
                  </td>
                  <td>
                    <input id="" type="text" name="outsourcing_fee[{{$i}}]" style="text-align:right;width:100px;" value="{{ number_format($csvDatas[$i-1]->price) }}" readonly>
                  </td>
                  <td>
                    @if($csvDatas[$i-1]->month < 10 and $csvDatas[$i-1]->day < 10 )
                    <input class="form-control" type="date" name="o_fee_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-0' . $csvDatas[$i-1]->month . '-0' . $csvDatas[$i-1]->day }}" readonly>
                    @elseif($csvDatas[$i-1]->day < 10)
                    <input class="form-control" type="date" name="o_fee_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-' . $csvDatas[$i-1]->month . '-0' . $csvDatas[$i-1]->day }}" readonly>
                    @else
                    <input class="form-control" type="date" name="o_fee_date[{{$i}}]" value="{{ $csvDatas[$i-1]->year . '-' . $csvDatas[$i-1]->month . '-' . $csvDatas[$i-1]->day }}" readonly>
                    @endif
                  </td>

                  @endif

                  <!-- 外部紹介料 -->
                  <td><input type="number" name="outsource[{{$i}}]" value="{{ $csvDatas[$i-1]->commissions->outsource }}" style="text-align:right;"></td>

                  <!-- 提供サービス -->
                  <td>
                    <select class="form-control" name="service[{{$i}}]">
                      @for($j=0; $j < count($service);$j++) 
                      @if($csvDatas[$i-1]->commissions->service === $service[$j])
                        <option value="{{ $service[$j] }}" selected>{{ $service[$j] }}</option>
                      @else
                        <option value="{{ $service[$j] }}">{{ $service[$j] }}</option>
                      @endif
                      @endfor
                    </select>
                  </td>

                  <!-- レート選択 -->
                  <td style="white-space:nowrap;">
                    <select name="rate[{{$i}}]">
                    @if($csvDatas[$i-1]->commissions->rate == 0)
                      <option value="0" selected>新レート</option>
                      <option value="1">旧レート</option>
                    @else
                      <option value="0">新レート</option>
                      <option value="1" selected>旧レート</option>
                    @endif
                    </select>
                  </td>

                  <!-- レート上限 -->
                  <td>
                    <input type="number"max="100" name="maxRate[{{$i}}]" style="width:50px;" value="{{ $csvDatas[$i-1]->commissions->maxRate }}">
                  </td>
                  <td>％</td>

                  <!-- 個別配分 -->
                  @foreach( $userList as $user)
                  <td style="white-space:nowrap;">
                    <input type="hidden" name="user[{{$i}}][{{$loop->index}}]" value="{{$user}}">
                    @if( $csvDatas[$i-1]->commissions->receiver_percent == null)
                    <input type="number" max="100" name="receiver_percent[{{$i}}][{{$loop->index}}]" style="width:50px;text-align:right;">
                    @else
                    <input type="number" max="100" name="receiver_percent[{{$i}}][{{$loop->index}}]" style="width:50px;text-align:right;" value="{{ $csvDatas[$i-1]->commissions->receiver_percent[$user]['rate'] }}">
                    @endif
                  </td>
                  <td>％</td>
                  <td style="white-space:nowrap;">
                    @if( $csvDatas[$i-1]->commissions->receiver_percent == null)
                    <input type="text" max="100" name="receiver_percent[{{$i}}][{{$loop->index}}]" style="width:100px;text-align:right;" readonly>
                    @else
                    <input type="text" max="100" name="receiver_price[{{$i}}][{{$loop->index}}]" style="width:100px;text-align:right;" value="{{ number_format($csvDatas[$i-1]->commissions->receiver_percent[$user]['price']) }}" readonly>
                    @endif
                  </td>
                  <td>円</td>
                  @endforeach

                  <!-- 会社配分 -->
                  <td>
                    <input type="number" max="100" name="percent_company[{{$i}}]" style="width:50px;" value="{{ $csvDatas[$i-1]->commissions->percent_company }}">
                  </td>
                  <td>％</td>
                  <td style="white-space:nowrap;">
                    <input type="text" max="100" name="dividend_company[{{$i}}]" style="width:100px;text-align:right;" value="{{ number_format($csvDatas[$i-1]->commissions->dividend_company) }}" readonly>
                  </td>
                  <td>円</td>

                  <!-- 備考 -->
                  <td style="white-space:nowrap;">
                    {{ $csvDatas[$i-1]->remark }}
                  </td>
                </tr>
                @endfor
                <tr>
                  <td>
                    <div class="text-center submit">
                      <button type="submit" name="save" class="btn-xs btn-red">登録する</button>
                    </div>
                  </td>
                  <td colspan=21></td>
                </tr>
              </tbody>
              </div>
            </form>
          </table>
        </div>
      </div>
</div>
