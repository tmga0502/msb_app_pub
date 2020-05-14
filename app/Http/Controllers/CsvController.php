<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Csv;
use App\Commissions;
use App\Libs\Commission;


use SplFileObject;

class CsvController extends Controller
{

    /*
  |--------------------------------------------------------------------------
  | CSV登録
  |--------------------------------------------------------------------------
*/
    public function uploadCsv(Request $request)
    {
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        $bank_number = $request->bank_number;


        setlocale(LC_ALL, 'ja_JP.UTF-8');

        $uploaded_file = $request->file('file');

        $file_path = $request->file('file')->path($uploaded_file);

        $file = new SplFileObject($file_path);
        $file->setFlags(SplFileObject::READ_CSV);


    //17口座なら
    if($bank_number == '17' || $bank_number == '19'){
        //配列の箱を用意
        $array = [];
        $row_count = 1;
        foreach ($file as $row) {

            if ($row === [null]) continue;
            if ($row[9] === "") continue;

            if ($row_count > 1) {

                $year_csv = mb_convert_encoding($row[0], 'UTF-8', 'SJIS');
                $month_csv = mb_convert_encoding($row[1], 'UTF-8', 'SJIS');
                $day_csv = mb_convert_encoding($row[2], 'UTF-8', 'SJIS');
                $name_csv = mb_convert_encoding($row[7], 'UTF-8', 'SJIS');
                $price_csv = mb_convert_encoding($row[9], 'UTF-8', 'SJIS');

                $csvimport_array = [
                    'bank_number' => $bank_number,
                    'year' => $year_csv,
                    'month' => $month_csv,
                    'day' => $day_csv,
                    'name' => $name_csv,
                    'price' => $price_csv,
                    'service' => ''
                ];

                // つくった配列の箱($array)に追加
                array_push($array, $csvimport_array);
            }

            $row_count++;
        }

        //配列をまるっとインポート(バルクインサート)
        Csv::insert($array);
        //コミッションtebleも作成
        // 登録したCsvテーブルを取得
        $inportCsv = Csv::where('year', '=', $year_csv)->where('month', '=', $month_csv)->get();
        // jsonArrayの作成
        $dates_instance = new Commission\GetDatas;
        $userList = $dates_instance->userList();
        $jsonArray = [];
        foreach ($userList as $list) {
            $jsonArray[$list] = ['rate' => 0, 'price' => 0];
        }
        // commissionTableのcreate
        foreach ($inportCsv as $in) {
            Commissions::create(['csv_id' => $in->id, 'receiver_percent' => $jsonArray]);
        }
    }elseif($bank_number == '0'){
        //配列の箱を用意
        $array = [];
        $row_count = 1;
        foreach ($file as $row) {

            if ($row === [null]) continue;

            if ($row_count > 1) {

                $year_csv = $row[0];
                $month_csv = $row[1];
                $day_csv = $row[2];
                $name_csv = $row[3];
                $price_csv = $row[4];
                $nominal = $row[5];
                $person = $row[6];
                $remark = $row[7];

                $csvimport_array = [
                    'bank_number' => 0,
                    'year' => $year_csv,
                    'month' => $month_csv,
                    'day' => $day_csv,
                    'name' => $name_csv,
                    'price' => $price_csv,
                    'nominal' => $nominal,
                    'service' => '',
                    'person' => $person,
                    'remark' => $remark
                ];

                // つくった配列の箱($array)に追加
                array_push($array, $csvimport_array);
            }

            $row_count++;
        }

        //配列をまるっとインポート(バルクインサート)
        Csv::insert($array);
        //コミッションtebleも作成
        // 登録したCsvテーブルを取得
        $inportCsv = Csv::where('year', '=', $year_csv)->where('month', '=', $month_csv)->get();
        // jsonArrayの作成
        $dates_instance = new Commission\GetDatas;
        $userList = $dates_instance->userList();
        $jsonArray = [];
        foreach ($userList as $list) {
            $jsonArray[$list] = ['rate' => 0, 'price' => 0];
        }
        // commissionTableのcreate
        foreach ($inportCsv as $in) {
            Commissions::create([
                'csv_id' => $in->id,
                'user_id' => $in->person,
                'receiver_percent' => $jsonArray
            ]);
        }
    }


        return redirect()->route('root.csv', compact('year', 'month', 'day'));
    }
}
