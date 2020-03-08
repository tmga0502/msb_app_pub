<div class="col-lg-8">
    <div class="panel panel-red">
        <div class="panel-heading">売上情報</div>
          <div class="panel-body">
            <table class="table table-bordered">
              <form method="post" action="{{ route('sales_update') }}">
                  @csrf
              <input type="hidden" name="id" value="{{ $customerList['id'] }}">
                <tr>
                  <td colspan=5 style='text-align:center' class="bg-info"><span class="label label-sm label-info">予定売上</span></td>
                </tr>


                <!-- 仲手 -->
                <tr>
                  <td rowspan=2 style="white-space: nowrap;text-align: center;vertical-align: middle;">仲手</td>
                  <td style="">金額</td>
                  <td  style="padding:0;margin:0;">
                  <input type="number" class="form-control" name="brokerage_fee" value="{{ $sales['brokerage_fee'] }}">
                  </td>
                  <td style="white-space: nowrap;">(税込)</td>
                  <td style="padding:0;margin:0;vertical-align:center;text-align:center;">
                    <input type="text" class="form-control input-nomal" value="{{ $sales['brokerage_fee'] * $tax }}円" readonly>
                  </td>
                </tr>
                <!-- end仲手 -->


                <!-- 入金予定 -->
                <tr>
                  <td style="white-space: nowrap;">入金予定</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    @if($sales['bf_payment_schedule'] == null)
                      <input type="month" class="form-control" name="bf_payment_schedule">
                    @else
                      <input type="month" class="form-control" name="bf_payment_schedule" value="{{date('Y-m',  strtotime($sales['bf_payment_schedule']))}}">
                    @endif
                  </td>
                </tr>
                <!-- end入金予定 -->

                <!-- AD -->
                <tr>
                  <td rowspan=2 style="white-space: nowrap;text-align: center;vertical-align: middle;">AD</td>
                  <td style="">金額</td>
                  <td style="padding:0;margin:0;">
                    <input type="number" class="form-control" name="advertising_fee" value="{{ $sales['advertising_fee'] }}">
                  </td>
                  <td style="white-space: nowrap;">(税込)</td>
                  <td colspan=4 style="padding:0;margin:0;">
                    <input type="text" class="form-control input-nomal" value="{{ $sales['advertising_fee'] * $tax }}円" readonly>
                  </td>
                </tr>
                <tr>
                  <td style="white-space: nowrap;">入金予定</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    @if($sales['ad_payment_schedule'] == null)
                      <input type="month" class="form-control" name="ad_payment_schedule">
                    @else
                      <input type="month" class="form-control" name="ad_payment_schedule" value="{{date('Y-m',  strtotime($sales['ad_payment_schedule']))}}">
                    @endif
                  </td>
                </tr>
                <!-- endAD -->


                <!-- 割引 -->
                <tr>
                  <td colspan=2 style="white-space: nowrap;">仲手割引</td>
                  <td style="padding:0;margin:0;">
                    <input type="number" class="form-control" name="discount" value="{{ $sales['discount'] }}">
                  </td>
                  <td style="white-space: nowrap;">AD相殺</td>
                  <td style="padding:0;margin:0;">
                    <input type="number" class="form-control" name="adOffset" value="{{ $sales['adOffset'] }}">
                  </td>
                </tr>
                <!-- end割引 -->



                <!-- 【確定】仲介手数料 -->
                <tr>
                  <td colspan="5" style='text-align:center' class="bg-green"><span class="label label-sm label-green">【確定】仲介手数料</span></td>
                </tr>
                <tr>
                  <td colspan=2 style="white-space: nowrap;">入金</td>
                  <td colspan=3>
                    <select class="form-control" name="bf_payment_check">
                      @if($sales['bf_payment_check'] == 0)
                        <option value=0 selected>---</option>
                        <option value=1>OK</option>
                      @else
                        <option value=0>---</option>
                        <option value=1 selected>OK</option>
                      @endif
                  </select>
                  </td>
                </tr>
                <tr>
                  <td colspan=2>入金額</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <input type="number" class="form-control" name="bf_payment_amount" value="{{ $sales['bf_payment_amount'] }}">
                  </td>
                </tr>

                <tr>
                  <td colspan=2>入金日</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    @if($sales['bf_payment'] == null)
                      <input type="date" class="form-control" name="bf_payment">
                    @else
                      <input type="date" class="form-control" name="bf_payment" value="{{date('Y-m-d',  strtotime($sales['bf_payment']))}}">
                    @endif
                  </td>
                </tr>
                <!-- end【確定】仲介手数料 -->


                <!-- 【確定】AD -->
                <tr>
                  <td colspan="5" style='text-align:center' class="bg-red"><span class="label label-sm label-red">【確定】AD</span></td>
                </tr>
                <tr>
                  <td colspan=2 style="white-space: nowrap;">入金</td>
                  <td colspan=3>
                    <select class="form-control" name="ad_payment_check">
                      @if($sales['ad_payment_check'] == 0)
                        <option value=0 selected>---</option>
                        <option value=1>OK</option>
                      @else
                        <option value=0>---</option>
                        <option value=1 selected>OK</option>
                      @endif
                  </select>
                  </td>
                </tr>
                <tr>
                  <td colspan=2>入金額</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <input type="number" class="form-control" name="ad_payment_amount" value="{{ $sales['ad_payment_amount'] }}">
                  </td>
                </tr>

                <tr>
                  <td colspan=2>入金日</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    @if($sales['ad_payment'] == null)
                      <input type="date" class="form-control" name="ad_payment">
                    @else
                      <input type="date" class="form-control" name="ad_payment" value="{{date('Y-m-d',  strtotime($sales['ad_payment']))}}">
                    @endif
                  </td>
                </tr>
                <!-- end【確定】AD -->



                <tr>
                  <td colspan=5 class="text-center submit">
                    <button type="submit" name="sales_data" class="btn-xs btn-default">更新</button>
                  </td>
                </tr>
              </form>
            </table>
            <br>
        </div>
    </div>
</div>
