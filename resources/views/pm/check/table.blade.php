<thead>
    <tr>
        <th>物件名</th>
        <th>部屋番号</th>
        <th>オーナー</th>
        <th>入居者</th>
        <th>備考</th>
        <th>入金日</th>
        <th>送金予定日</th>
        <th>事務チェック</th>
        <th>送金日</th>
        <th>備考</th>
    </tr>
</thead>
<tbody>
@for($i = 0; $i < count($lists); $i++)
    <tr>
     <input type="hidden" name="id[{{$i}}]" value="{{$lists[$i]->id}}">
      <td style="white-space:nowrap;">{{$lists[$i]->pms->property_name}}</td>
      <td>{{$lists[$i]->pms->room_number}}</td>
      <td>{{$lists[$i]->pms->owner_name}}</td>
      <td>{{$lists[$i]->pms->tenant_name}}</td>
      <td>{{$lists[$i]->pms->transfer_name}}</td>
      <!-- 入金日 -->
      <td>
        <input type="checkbox" class="pc[{{$i}}]" id="pc_c_{{$i}}">
        <input type="date" class="input-sm" value="{{$lists[$i]->person_check}}" name="person_check[{{$i}}]" id="person_check_{{$i}}">
      </td>

      <!-- 送金予定日 -->
      <td>
        <input type="checkbox" class="td[{{$i}}]" id="td_c_{{$i}}">
        <input type="date" class="input-sm" value="{{$lists[$i]->remittance_date}}" name="remittance_date[{{$i}}]" id="remittance_date_{{$i}}">
      </td>

      <!-- 事務チェック -->
      <td>
        <input type="checkbox" class="cc[{{$i}}]" id="cc_c_{{$i}}">
        <input type="date" class="input-sm" value="{{$lists[$i]->clerk_check}}" name="clerk_check[{{$i}}]" id="clerk_check_{{$i}}">
      </td>

      <!-- 送金日 -->
      <td>
        <input type="date" class="input-sm" value="{{$lists[$i]->transfer_date}}" name="transfer_date[{{$i}}]">
      </td>

      <!-- 備考 -->
      <td>
        <textarea name="remark[{{$i}}]">{{$lists[$i]->remark}}</textarea>
      </td>
    </tr>
@endfor
    <tr>
        <td>
          <button type="submit" class="btn btn-primary btn-block">更新</button>
        </td>
    </tr>
</tbody>
