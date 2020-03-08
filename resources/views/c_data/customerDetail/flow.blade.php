<div class="col-lg-4">
  <div class="panel panel-violet">
      <div class="panel-heading">審査後フロー</div>
      <div class="panel-body">
          <table class="table table-hover table-bordered">
            <form method="post" action="{{ route('flow_update') }}">
                @csrf
            <input type="hidden" name="id" value="{{ $customerList['id'] }}">
              <tr>
                  <td>必要書類の伝達</td>
                  <td style="padding:0;margin:0;">
                    <!-- required_documents -->
                    <select class="form-control" name="required_documents">
                      @if($flow['required_documents']== 0)
                        <option value=0 selected>未</option>
                      @else
                        <option value=0>未</option>
                      @endif

                      @if($flow['required_documents']== 1)
                        <option value=1 selected>OK</option>
                      @else
                        <option value=1>OK</option>
                      @endif

                      @if($flow['required_documents']== 2)
                        <option value=2 selected>不要</option>
                      @else
                        <option value=2>不要</option>
                      @endif
                    </select>
                  </td>
              </tr>
              <tr>
                  <td>契約場所案内</td>
                  <td style="padding:0;margin:0;">
                    <!-- contract_location -->
                    <select class="form-control" name="contract_location">
                      @if($flow['contract_location']== 0)
                        <option value=0 selected>未</option>
                      @else
                        <option value=0>未</option>
                      @endif

                      @if($flow['contract_location']== 1)
                        <option value=1 selected>OK</option>
                      @else
                        <option value=1>OK</option>
                      @endif

                      @if($flow['contract_location']== 2)
                        <option value=2 selected>不要</option>
                      @else
                        <option value=2>不要</option>
                      @endif
                    </select>
                  </td>
              </tr>
              <tr>
                  <td>精算書送付</td>
                  <td style="padding:0;margin:0;">
                    <!-- settlement -->
                    <select class="form-control" name="settlement">
                      @if($flow['settlement']== 0)
                        <option value=0 selected>未</option>
                      @else
                        <option value=0>未</option>
                      @endif

                      @if($flow['settlement']== 1)
                        <option value=1 selected>OK</option>
                      @else
                        <option value=1>OK</option>
                      @endif

                      @if($flow['settlement']== 2)
                        <option value=2 selected>不要</option>
                      @else
                        <option value=2>不要</option>
                      @endif
                    </select>
                  </td>
              </tr>
              <tr>
                  <td>ライフライン案内</td>
                  <td style="padding:0;margin:0;">
                    <!-- life_line -->
                    <select class="form-control" name="life_line">
                      @if($flow['life_line']== 0)
                        <option value=0 selected>未</option>
                      @else
                        <option value=0>未</option>
                      @endif

                      @if($flow['life_line']== 1)
                        <option value=1 selected>OK</option>
                      @else
                        <option value=1>OK</option>
                      @endif

                      @if($flow['life_line']== 2)
                        <option value=2 selected>不要</option>
                      @else
                        <option value=2>不要</option>
                      @endif
                    </select>
                  </td>
              </tr>
              <tr>
                  <td>契約金入金確認</td>
                  <td style="padding:0;margin:0;">
                    <!-- confirmation -->
                    <select class="form-control" name="confirmation">
                      @if($flow['confirmation']== 0)
                        <option value=0 selected>未</option>
                      @else
                        <option value=0>未</option>
                      @endif

                      @if($flow['confirmation']== 1)
                        <option value=1 selected>OK</option>
                      @else
                        <option value=1>OK</option>
                      @endif

                      @if($flow['confirmation']== 2)
                        <option value=2 selected>不要</option>
                      @else
                        <option value=2>不要</option>
                      @endif
                    </select>
                  </td>
              </tr>
              <tr>
                  <td>保証人承諾書案内</td>
                  <td style="padding:0;margin:0;">
                    <!-- guarantor -->
                    <select class="form-control" name="guarantor">
                      @if($flow['guarantor']== 0)
                        <option value=0 selected>未</option>
                      @else
                        <option value=0>未</option>
                      @endif

                      @if($flow['guarantor']== 1)
                        <option value=1 selected>OK</option>
                      @else
                        <option value=1>OK</option>
                      @endif

                      @if($flow['guarantor']== 2)
                        <option value=2 selected>不要</option>
                      @else
                        <option value=2>不要</option>
                      @endif
                    </select>
                  </td>
              </tr>
              <tr>
                  <td>鍵渡し場所案内</td>
                  <td style="padding:0;margin:0;">
                    <!-- hand_ovre_kye -->
                    <select class="form-control" name="hand_ovre_kye">
                      @if($flow['hand_ovre_kye']== 0)
                        <option value=0 selected>未</option>
                      @else
                        <option value=0>未</option>
                      @endif

                      @if($flow['hand_ovre_kye']== 1)
                        <option value=1 selected>OK</option>
                      @else
                        <option value=1>OK</option>
                      @endif

                      @if($flow['hand_ovre_kye']== 2)
                        <option value=2 selected>不要</option>
                      @else
                        <option value=2>不要</option>
                      @endif
                    </select>
                  </td>
              </tr>
              <tr>
                  <td>契約手続き</td>
                  <td style="padding:0;margin:0;">
                    <!-- contract_procedures -->
                    <select class="form-control" name="contract_procedures">
                      @if($flow['contract_procedures']== 0)
                        <option value=0 selected>未</option>
                      @else
                        <option value=0>未</option>
                      @endif

                      @if($flow['contract_procedures']== 1)
                        <option value=1 selected>OK</option>
                      @else
                        <option value=1>OK</option>
                      @endif

                      @if($flow['contract_procedures']== 2)
                        <option value=2 selected>不要</option>
                      @else
                        <option value=2>不要</option>
                      @endif
                    </select>
                  </td>
              </tr>
              <tr>
                  <td>AD請求書送付</td>
                  <td style="padding:0;margin:0;">
                    <!-- ADs_invoice -->
                    <select class="form-control" name="ADs_invoice">
                      @if($flow['ADs_invoice']== 0)
                        <option value=0 selected>未</option>
                      @else
                        <option value=0>未</option>
                      @endif

                      @if($flow['ADs_invoice']== 1)
                        <option value=1 selected>OK</option>
                      @else
                        <option value=1>OK</option>
                      @endif

                      @if($flow['ADs_invoice']== 2)
                        <option value=2 selected>不要</option>
                      @else
                        <option value=2>不要</option>
                      @endif
                    </select>
                  </td>
              </tr>
              <tr>
                <td colspan=2 class="text-center submit">
                  <button type="submit" name="flow_data" class="btn-xs btn-default">更新</button>
                </td>
              </tr>
            </form>
          </table>
          <br><br><br><br><br><br>
      </div>
  </div>
</div>
