<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
/*
  |--------------------------------------------------------------------------
  | 【詳細情報】
  |  'sex' → 性別
  |  'birthday' → 誕生日
  |  'age' → 年齢
  |  'born' → 出身
  |  'partner' → パートナー
  |  'child' → 子供
  |  'partner_name' → パートナー名
  |  'partner_birthday' → パートナー誕生日
  |  'child1_name' → 子供１名前
  |  'child1_birthday' → 子供１誕生日
  |  'child2_name' → 子供２名前
  |  'child2_birthday' → 子供２誕生日
  |  'relation' → 関係性
  |  'encount' → 出会い
  |  'hope' → 結家に期待していること
  |  'job' → 仕事
  |  'position' → 役職
  |  'hoby' → 趣味
  |  'dream' → 夢
  |  'other' → その他
  |
  |--------------------------------------------------------------------------
*/

    protected $fillable = [
        'sex',
        'birthday',
        'age',
        'born',
        'partner',
        'child',
        'partner_name',
        'partner_birthday',
        'child1_name',
        'child1_birthday',
        'child2_name',
        'child2_birthday',
        'relation',
        'encount',
        'hope',
        'job',
        'position',
        'hoby',
        'dream',
        'other'
    ];
}
