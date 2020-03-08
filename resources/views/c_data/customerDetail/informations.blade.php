<div class="col-md-4">
  <div class="panel panel-yellow">
      <div class="panel-heading">お客様情報</div>
        <div class="panel-body">
          <table class="table table-hover table-bordered">
            <form method="post" action="{{ route('c_info_update') }}">
                @csrf
            <input type="hidden" name="id" value="{{ $customerList['id'] }}">

            <!-- お客様名 -->
              <tr>
                <td style="white-space: nowrap;">お客様名</td>
                <td colspan=2 style="padding:0;margin:0;">
                  <input type="text" class="form-control" name="customer_name" value="{{ $customerList['customer_name'] }}">
                </td>
              </tr>
            <!-- endお客様名 -->

            <!-- ふりがな -->
              <tr>
                <td>ふりがな</td>
                <td colspan=2 style="padding:0;margin:0;">
                  <input type="text" class="form-control" name="reading" value="{{ $customerList['reading'] }}">
                </td>
              </tr>
            <!-- endふりがな -->


            <!-- 状況 -->
              <tr>
                <td>状況</td>
                <td colspan=2 style="padding:0;margin:0;">
                  <select class="form-control" name="status">
                    @for($i=0; $i < count($status);$i++)
                      @if($customerList['status'] == $status[$i])
                        <option value="{{ $status[$i] }}" selected>{{ $status[$i] }}</option>
                      @else
                        <option value="{{ $status[$i] }}">{{ $status[$i] }}</option>
                      @endif
                    @endfor
                  </select>
                </td>
              </tr>
            <!-- end状況 -->


            <!-- 確度 -->
              <tr>
                <td>確度</td>
                <td colspan=2 style="padding:0;margin:0;">
                  <select class="form-control" name="accuracy">
                    @for($i=0; $i < count($accuracy);$i++)
                      @if($customerList['accuracy'] == $accuracy[$i])
                        <option value="{{ $accuracy[$i] }}" selected>{{ $accuracy[$i] }}</option>
                      @else
                      <option value="{{ $accuracy[$i] }}">{{ $accuracy[$i] }}</option>
                      @endif
                    @endfor
                  </select>
                </td>
              </tr>
              <!-- end確度 -->


              <!-- 紹介日 -->
              <tr>
                <td>紹介</td>
                <td style="padding:0;margin:0;">
                  @if($customerList['introduce'] == null)
                    <input type="month" class="form-control" name="introduce">
                  @else
                    <input type="month" class="form-control" name="introduce" value="{{date('Y-m',  strtotime($customerList['introduce']))}}">
                  @endif
                </td>
              </tr>
              <tr>
            <!-- end紹介日 -->



            <!-- 申込み予定日 -->
                <td>申込予定</td>
                <td style="padding:0;margin:0;">
                  @if($customerList['apply'] == null)
                    <input type="month" class="form-control" name="apply">
                  @else
                    <input type="month" class="form-control" name="apply" value="{{date('Y-m',  strtotime($customerList['apply']))}}">
                  @endif
                </td>
              </tr>
            <!-- end申込み予定日 -->



            <!-- 案件種別 -->
              <tr>
                <td>案件種別</td>
                <td colspan=2 style="padding:0;margin:0;">
                  <select class="form-control" name="introducer">
                    @for($i=0; $i < count($introducer);$i++)
                      @if($customerList['introducer'] == $introducer[$i])
                        <option value="{{ $introducer[$i] }}" selected>{{ $introducer[$i] }}</option>
                      @else
                        <option value="{{ $introducer[$i] }}">{{ $introducer[$i] }}</option>
                      @endif
                    @endfor
                  </select>
                </td>
              </tr>
              <tr>
            <!-- end案件種別 -->



            <!-- 紹介者名 -->
                <td>紹介者名</td>
                <td colspan=2 style="padding:0;margin:0;">
                <input type="text" class="form-control" name="introducer_name" value="{{ $customerList['introducer_name'] }}">
                </td>
              </tr>
            <!-- end紹介者名 -->


            <!-- 紹介種別 -->
              <tr>
                <td>紹介種別</td>
                <td colspan=2 style="padding:0;margin:0;">
                  <select class="form-control" name="introduction_type">
                    @for($i=0; $i < count($introduction_type);$i++)
                      @if($customerList['introduction_type'] == $introduction_type[$i])
                        <option value="{{ $introduction_type[$i] }}" selected>{{ $introduction_type[$i] }}</option>
                      @else
                        <option value="{{ $introduction_type[$i] }}">{{ $introduction_type[$i] }}</option>
                      @endif
                    @endfor
                  </select>
                </td>
              </tr>
            <!-- end紹介種別 -->


            <!-- 進捗 -->
              <tr>
                <td>進捗状況</td>
                <td colspan=2 style="padding:0;margin:0;">
                  <textarea name="progress" class="form-control">{{ $customerList['progress'] }}</textarea>
                </td>
              </tr>
            <!-- end進捗 -->


            <!-- 備考 -->
              <tr>
                <td>備考</td>
                <td colspan=2 style="padding:0;margin:0;">
                  <textarea name="remarks" class="form-control">{{ $customerList['remarks'] }}</textarea>
                </td>
              </tr>
            <!-- end備考 -->


              <tr>
                <td colspan=5 class="text-center submit">
                  <button type="submit" name="customer_data" class="btn-xs btn-default">更新</button>
                </td>
              </tr>
        </form>
        </table>
        </div>
        <br><br><br><br><br><br>
  </div>
</div>
