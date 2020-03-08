<div class="col-lg-12">
    <div class="panel panel-grey">
        <div class="panel-heading">詳細情報</div>
        <div class="panel-body">
            <table class="table table-bordered">
              <form method="post" action="{{ route('details_update') }}">
                  @csrf
              <input type="hidden" name="id" value="{{ $customerList['id'] }}">
                <tr>
                  <td>性別</td>
                  <td style="padding:0;margin:0;">
                    <!-- sex -->
                    <select class="form-control" name="sex">
                      @if($detail['sex']== 0)
                        <option value=0 selected>男</option>
                      @else
                        <option value=0>男</option>
                      @endif

                      @if($detail['sex']== 1)
                        <option value=1 selected>女</option>
                      @else
                        <option value=1>女</option>
                      @endif
                    </select>
                  </td>
                  <td>出身</td>
                  <td style="padding:0;margin:0;">
                    <!-- born -->
                    <input type="text" class="form-control" name="born" value="{{ $detail['born'] }}">
                  </td>
                </tr>
                <tr>
                  <td>誕生日</td>
                  <td style="padding:0;margin:0;">
                    <!-- birthday -->
                    <input type="date" class="form-control" name="birthday" value="{{ $detail['birthday'] }}">
                  </td>
                  <td>年齢</td>
                  <td style="padding:0;margin:0;">
                    <!-- age -->
                    <input type="number" class="form-control" name="age" value="{{ $detail['age'] }}">
                  </td>
                <tr>
                  <td>パートナー</td>
                  <td style="padding:0;margin:0;">
                    <!-- partner -->
                    <select class="form-control" name="partner">
                      @if($detail['partner']== 0)
                        <option value=0 selected>不明</option>
                      @else
                        <option value=0>不明</option>
                      @endif

                      @if($detail['partner']== 1)
                        <option value=1 selected>なし</option>
                      @else
                        <option value=1>なし</option>
                      @endif

                      @if($detail['partner']== 2)
                        <option value=2 selected>恋人</option>
                      @else
                        <option value=2>恋人</option>
                      @endif

                      @if($detail['partner']== 2)
                        <option value=2 selected>既婚</option>
                      @else
                        <option value=2>既婚</option>
                      @endif
                    </select>
                  </td>
                  <td>子供</td>
                  <td style="padding:0;margin:0;">
                    <!-- child -->
                    <select class="form-control" name="child">
                      @if($detail['child']== 0)
                        <option value=0 selected>不明</option>
                      @else
                        <option value=0>不明</option>
                      @endif

                      @if($detail['child']== 1)
                        <option value=1 selected>いない</option>
                      @else
                        <option value=1>いない</option>
                      @endif

                      @if($detail['child']== 2)
                        <option value=2 selected>いる</option>
                      @else
                        <option value=2>いる</option>
                      @endif
                  </td>
                </tr>
                <tr>
                  <td colspan=4 style='text-align:center' class="bg-warning"><span class="label label-sm label-warning">パートナー</span></td>
                </tr>
                <tr>
                  <td>名前</td>
                  <td style="padding:0;margin:0;">
                    <!-- partner_name -->
                    <input type="text" class="form-control" name="partner_name" value="{{ $detail['partner_name'] }}">
                  </td>
                  <td>誕生日</td>
                  <td style="padding:0;margin:0;">
                    <!-- partner_birthday -->
                    <input type="date" class="form-control" name="partner_birthday" value="{{ $detail['partner_birthday'] }}">
                  </td>
                <tr>
                  <td colspan=4 style='text-align:center' class="bg-danger"><span class="label label-sm label-danger">子供</span></td>
                </tr>
                <tr>
                  <td>名前</td>
                  <td style="padding:0;margin:0;">
                    <!-- child1_name -->
                    <input type="text" class="form-control" name="child1_name" value="{{ $detail['child1_name'] }}">
                  </td>
                  <td>誕生日</td>
                  <td style="padding:0;margin:0;">
                    <!-- child1_birthday -->
                    <input type="date" class="form-control" name="child1_birthday" value="{{ $detail['child1_birthday'] }}">
                  </td>
                </tr>
                <tr>
                  <td>名前</td>
                  <td style="padding:0;margin:0;">
                    <!-- child2_name -->
                    <input type="text" class="form-control" name="child2_name" value="{{ $detail['child2_name'] }}">
                  </td>
                  <td>誕生日</td>
                  <td style="padding:0;margin:0;">
                    <!-- child2_birthday -->
                    <input type="date" class="form-control" name="child2_birthday" value="{{ $detail['child2_birthday'] }}">
                  </td>
                </tr>
                <tr>
                  <td colspan=4 style='text-align:center' class="bg-info"><span class="label label-sm label-info">その他</span></td>
                </tr>
                <tr>
                  <td>紹介者との関係性</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- relation -->
                    <textarea class="form-control" name="relation">{{ $detail['relation'] }}</textarea>
                  </td>
                </tr>
                <tr>
                  <td>紹介者との出会い</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- encount -->
                    <textarea class="form-control" name="encount">{{ $detail['encount'] }}</textarea>
                  </td>
                </tr>
                <tr>
                  <td>結家に期待すること</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- hope -->
                    <textarea class="form-control" name="hope">{{ $detail['hope'] }}</textarea>
                  </td>
                </tr>
                <tr>
                  <td>職業</td>
                  <td style="padding:0;margin:0;">
                    <!-- job -->
                    <input type="text" class="form-control" name="job" value="{{ $detail['job'] }}">
                  </td>
                  <td>役職</td>
                  <td style="padding:0;margin:0;">
                    <!-- position -->
                    <input type="text" class="form-control" name="position" value="{{ $detail['position'] }}">
                  </td>
                </tr>
                <tr>
                  <td>趣味</td>
                  <td colspan=3  style="padding:0;margin:0;">
                    <!-- hoby -->
                    <textarea class="form-control" name="hoby">{{ $detail['hoby'] }}</textarea>
                  </td>
                </tr>
                <tr>
                  <td>夢・目標</td>
                  <td colspan=3 style="padding:0;margin:0;">
                    <!-- dream -->
                    <textarea class="form-control" name="dream">{{ $detail['dream'] }}</textarea>
                  </td>
                </tr>
                <tr>
                  <td>その他</td>
                  <td  colspan=3 style="padding:0;margin:0;">
                    <!-- other -->
                    <textarea class="form-control" name="other">{{ $detail['other'] }}</textarea>
                  </td>
                </tr>
                <tr>
                  <td colspan=4 class="text-center submit">
                    <button type="submit" name="detail_data" class="btn-xs btn-default">更新</button>
                  </td>
                </tr>
              </form>
            </table>
        </div>
    </div>
</div>
