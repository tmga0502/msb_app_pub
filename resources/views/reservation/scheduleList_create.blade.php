
  <div class="panel panel-red">
        <div class="panel-heading">
         {{$year}}年{{$month}}月{{$day}}日
        </div>
        <div class="panel-body">
            <!-- タイムゾーン -->
            <div class="col-xs-2" style="padding:0;">
              @foreach($tzList as $tz)
                {!! $tz !!}
              @endforeach
            </div>
            <!-- Aスペ -->
            <div class="col-xs-2" style="padding:0;">
              @foreach($schedule_A as $A)
              {!! $A !!}
              @endforeach
            </div>
            <!-- Bスペ -->
            <div class="col-xs-2" style="padding:0;">
              @foreach($schedule_B as $B)
              {!! $B !!}
              @endforeach
            </div>
            <!-- Cスペ -->
            <div class="col-xs-2" style="padding:0;">
              @foreach($schedule_C as $C)
              {!! $C !!}
              @endforeach
            </div>
            <!-- 印鑑 -->
            <div class="col-xs-2" style="padding:0;">
              @foreach($schedule_I as $I)
              {!! $I !!}
              @endforeach
            </div>
        </div><br>
  </div>
