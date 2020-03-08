<div class="col-lg-8">
    <div class="panel panel-green">
        <div class="panel-heading">物件情報</div>
        <div class="panel-body">
            <table class="table table-hover table-bordered">
              <form method="POST" class="navbar-form navbar-left" action="{{ route('propertyInformation_update') }}">
                  @csrf
              <input type="hidden" name="id" value="{{ $customerList['id'] }}">
              <span class="p-country-name" style="display:none;">Japan</span>
                <tr>
                  <td>郵便番号</td>
                  <td style="padding:0;margin:0;vertical-align: middle;">
                  <input type="hidden" name="id" value="{{ $customerList['id'] }}">
                    <!-- postal_code -->
                    <input type="text" style="width:15%;" name="first_code" value="{{$p_info['first_code']}}">

                    　-　

                    <input type="text" style="width:20%;" name="last_code" value="{{$p_info['last_code']}}">
                  </td>
                </tr>
                <tr>
                  <td>都道府県</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- prefecture -->
                    <input type="text" class="form-control" name="prefecture" value="{{$p_info['prefecture']}}">
                  </td>
                </tr>
                <tr>
                  <td>市区町村</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- address2 -->
                    <input type="text" class="form-control" name="city" value="{{$p_info['city']}}">
                  </td>
                </tr>
                <tr>
                  <td>住所</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- address3 -->
                    <input type="text" class="form-control" name="address" value="{{$p_info['address']}}">
                  </td>
                </tr>
                <tr>
                  <td>物件名</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- apartment_name -->
                    <input type="text" class="form-control" name="apartment_name" value="{{$p_info['apartment_name']}}">
                  </td>
                </tr>
                <tr>
                  <td>号室</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- room_number -->
                    <input type="text" class="form-control" name="room_number" value="{{$p_info['room_number']}}">
                  </td>
                </tr>
                <tr>
                  <td>管理会社名</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- real_estate_agent -->
                    <input type="text" class="form-control" name="real_estate_agent" value="{{$p_info['real_estate_agent']}}">
                  </td>
                </tr>
                <tr>
                  <td>担当</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- person_in_charge -->
                    <input type="text" class="form-control" name="person_in_charge" value="{{$p_info['person_in_charge']}}">
                  </td>
                </tr>
                <tr>
                  <td>電話番号</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- tel -->
                    <input type="text" class="form-control" name="tel" value="{{$p_info['tel']}}">
                  </td>
                </tr>
                <tr>
                  <td>FAX番号</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- fax -->
                    <input type="text" class="form-control" name="fax" value="{{$p_info['fax']}}">
                  </td>
                </tr>
                <tr>
                  <td>賃発日</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- contract_start -->
                    <input type="date" class="form-control" name="contract_start" value="{{$p_info['contract_start']}}">
                  </td>
                </tr>
                <tr>
                    <td>解約日</td>
                    <td  colspan=3 style="padding:0;margin:0;">
                      <!-- contract_end -->
                      <input type="date" class="form-control" name="contract_end" value="{{$p_info['contract_end']}}">
                    </td>
                </tr>
                <tr>
                  <td colspan=4 class="text-center submit">
                    <button type="submit" name="property_data" class="btn-xs btn-default">更新</button>
                  </td>
                </tr>
              </form>
            </table>
        </div>
    </div>
</div>
