<div class="col-md-7 col-sm-12">
  <div class="panel panel-grey">
        <div class="panel-heading">
         {{$year}}年{{$month}}月{{$day}}日
        </div>
        <div class="panel-body">
            <!-- Aスペ -->
            <div class="col-xs-2 col-xs-offset-1" style="padding:0;">
            @foreach($schedule_A as $a)
            {!! $a !!}
            @endforeach
            </div>
            <!-- Bスペ -->
            <div class="col-xs-2" style="padding:0;">
            @foreach($schedule_B as $b)
            {!! $b !!}
            @endforeach
            </div>
            <!-- Cスペ -->
            <div class="col-xs-2" style="padding:0;">
            @foreach($schedule_C as $c)
            {!! $c !!}
            @endforeach
            </div>
            <!-- 印鑑 -->
            <div class="col-xs-2" style="padding:0;">
            @foreach($schedule_I as $i)
            {!! $i !!}
            @endforeach
            </div>
            <!-- ZOOM -->
            <div class="col-xs-2" style="padding:0;">
            @foreach($schedule_Z as $i)
            {!! $i !!}
            @endforeach
            </div>
        </div><br>
  </div>
</div>
