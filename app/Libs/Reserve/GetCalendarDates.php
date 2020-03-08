<?php namespace App\Libs\Reserve;

use Carbon\Carbon;

class GetCalendarDates {


/*
  |--------------------------------------------------------------------------
  | カレンダー作成Method
  |--------------------------------------------------------------------------
*/
    public function getCalendarDates($year, $month)
    {
        $dateStr = sprintf('%04d-%02d-01', $year, $month);
        $date = new Carbon("{$year}-{$month}-01");
        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        $addDay = ($date->copy()->endOfMonth()->isSunday()) ? 7 : 0;
        $date->subDay($date->dayOfWeek);
        // 同上。右下の隙間のための計算。
        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }
        return $dates;
    }

}
