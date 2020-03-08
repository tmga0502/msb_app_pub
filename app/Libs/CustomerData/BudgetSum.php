<?php

namespace App\Libs\CustomerData;

class BudgetSum
{

/*
  |--------------------------------------------------------------------------
  | 必達・ストレッチの合計
  |--------------------------------------------------------------------------
*/

	public function rsSum($array){
		// 各項目の年間合計(必達)
		$RyearsSum = [];
		// 各項目の年間合計(ストレッチ)
		$SyearsSum = [];
		// 各項目の月別合計(必達)
		$RcontentsSum = [];
		// 各項目の月別合計(ストレッチ)
		$ScontentsSum = [];
		foreach($array as $key => $list){
            if(is_array($list)){
            	$str = substr($key, 0, 1);
            	if($str == "R"){
            		// 必達合計
            		$RyearsSum[] = array_sum($list);
            	}elseif($str == "S"){
            		// ストレッチ合計
            		$SyearsSum[] = array_sum($list);
            	}

            	foreach($list as $k => $v){
            		if($str == "R"){
            			// 各項目　必達合計
	            		if(isset($RcontentsSum[$k])){
	            			$RcontentsSum[$k] += $v;
	            		}else{
	            			$RcontentsSum[$k] = $v;
	            		}
	            	}elseif($str == "S"){
	            		// 各項目ストレッチ合計
	            		if(isset($ScontentsSum[$k])){
	            			$ScontentsSum[$k] += $v;
	            		}else{
	            			$ScontentsSum[$k] = $v;
	            		}
	            	}
            	}
             }
         }
         // 年間の総合計計算->各yearSumにpush
         array_push($RcontentsSum, array_sum($RyearsSum));
         array_push($ScontentsSum, array_sum($SyearsSum));
        return [$RyearsSum, $SyearsSum, $RcontentsSum, $ScontentsSum];
	}

}