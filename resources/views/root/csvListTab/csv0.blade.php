<!-- 一覧テーブル -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-red">
      <div class="panel-heading">{{ $now_year }}年{{ $now_month }}月分入金リスト</div>
      <div class="panel-body">
        @if(isset($datas0[0]))
        <table class="table table-hover table-borde" style="font-size: 8px;">
          <thead>
            <tr>
              <th style="white-space: nowrap;">口座名</th>
              <th>年月</th>
              <th>摘要</th>
              <th style="white-space: nowrap;">お預り金額</th>
              <th>名目</th>
              <th>担当</th>
              <th>備考</th>
            </tr>
          </thead>
          <tbody>
            @if($now_month == 1)
              <input type="hidden" name="year" value="{{ $now_year - 1 }}">
              <input type="hidden" name="month" value="12">
              <input type="hidden" name="day" value="{{ $now_day }}">
            @else
              <input type="hidden" name="year" value="{{ $now_year }}">
              <input type="hidden" name="month" value="{{ $now_month }}">
              <input type="hidden" name="day" value="{{ $now_day }}">
            @endif
            @foreach($datas0 as $data)
              <tr>
                <input type="hidden" name="id[{{ $data['id'] }}]" value="{{ $data['id'] }}">
                <td>現・紹</td>
                <td style="white-space: nowrap;">
                  @if($data['month'] < 10 and $data['day'] < 10 )
                    <input type="date" style="border:0px;" name="date[{{ $data['id'] }}]" value="{{ $data['year'] . '-0' . $data['month'] . '-0' . $data['day']}}" readonly>
                  @elseif($data['day'] < 10)
                    <input type="date" style="border:0px;" name="date[{{ $data['id'] }}]" value="{{ $data['year'] . '-' . $data['month'] . '-0' . $data['day']}}" readonly>
                  @else
                    <input type="date" style="border:0px;" name="date[{{ $data['id'] }}]" value="{{ $data['year'] . '-' . $data['month'] . '-' . $data['day']}}" readonly>
                  @endif
                </td>
                <td style="white-space: nowrap;">{{ $data->name }}</td>
                <!-- 金額 -->
                <td style="white-space: nowrap;">
                  <div style="text-align:right;">
                    <input type="text" style="text-align:right;" name="price[{{ $data['id'] }}]" value="{{ number_format($data['price']) }}" readonly>
                  </div>
                </td>
                <!-- 名目 -->
                <td style="white-space: nowrap;">
                  <select name="nominal[{{ $data['id'] }}]" onchange="selectboxChange(this);" style="height: 20px; font-size: 8px;">
                  @for($i=0; $i < count($nominalForRoot17);$i++)
                  @if($data['nominal']==$nominalForRoot17[$i])
                    <option value="{{ $nominalForRoot17[$i] }}" selected>{{ $nominalForRoot17[$i] }}</option>
                  @else
                    <option value="{{ $nominalForRoot17[$i] }}">{{ $nominalForRoot17[$i] }}</option>
                  @endif
                  @endfor
                  </select>
                </td>
                <!-- 担当 -->
                <td style="white-space: nowrap;">
                  <select name="person[{{ $data['id'] }}]" style="height: 20px; font-size: 8px;">
                  @for($i=0; $i < count($userList);$i++)
                  @if($data['person']==$userList[$i])
                    <option value="{{ $userList[$i] }}" selected>{{ $userList[$i] }}</option>
                  @else
                    <option value="{{ $userList[$i] }}">{{ $userList[$i] }}</option>
                  @endif
                  @endfor
                  </select>
                </td>
                <!-- 備考 -->
                <td style="white-space: nowrap;">
                  <textarea name="remark[{{ $data['id'] }}]" readonly>{{ $data['remark'] }}</textarea>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
      <!-- end一覧テーブル -->
    </div>
  </div>
</div>
