<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Carbon\Carbon;
use App\Commissions;
use App\Payrolls;

class UserController extends Controller
{
/*
|--------------------------------------------------------------------------
| ログイントップ(設備予約)
|--------------------------------------------------------------------------
*/
    public function getLogin(){
     return view('login.loginTop');
    }

// 緊急用サインアップ画面
    public function emargencySignup(){
     return view('login.e_signup');
    }

     public function eNew(Request $request){
        // バリデーション
        $this->validate($request,[
        'name' => 'required',
        'loginID' => 'required',
        'password' => 'required|min:6',
        'contract_type' => 'required'
        ]);
        // DBインサート
        $user = new User([
            'name' => $request->input('name'),
            'loginID' => $request->input('loginID'),
            'password' => bcrypt($request->input('password')),
            'contract_type' => $request->contract_type
        ]);

        // 保存
        $user->save();
        return redirect()->route('login');
     }


/*
|--------------------------------------------------------------------------
| Topページ表示
|--------------------------------------------------------------------------
*/
    //トップページ
    public function getTop(){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        return view('Top.top', compact('year', 'month', 'day'));
    }

/*
  |--------------------------------------------------------------------------
  | サブページ表示
  |--------------------------------------------------------------------------
*/
    // 顧客管理ページ
    public function getCdata(){
        return view('Top.c_data');
    }

/*
|--------------------------------------------------------------------------
| サインアップ画面
|--------------------------------------------------------------------------
*/
    public function getSignup(){
        return View('root.signup');
    }


/*
|--------------------------------------------------------------------------
| サインアップ処理
|--------------------------------------------------------------------------
*/
    public function postSignup(Request $request){
        // バリデーション
        $this->validate($request,[
        'name' => 'required',
        'loginID' => 'required',
        'password' => 'required|min:6',
        'contract_type' => 'required'
        ]);
        $bank_number = ($request->bank_number == "") ? null : $request->bank_number;
        $birthday = ($request->birthday == "") ? null : $request->birthday;
        $hire = ($request->hire == "") ? null : $request->hire;
        $legal_hire = ($request->legal_hire == "") ? null : $request->legal_hire;
        // DBインサート
        $user = new User([
            'name' => $request->input('name'),
            'loginID' => $request->input('loginID'),
            'password' => bcrypt($request->input('password')),
            'contract_type' => $request->contract_type,
            'contract_type2' => $request->contract_type2,
            'superUser' => $request->superUser,
            'bank' => $request->bank,
            'bank_branch' => $request->bank_branch,
            'bank_type' => $request->bank_type,
            'bank_number' => $bank_number,
            'tel' => $request->tel,
            'lineID' => $request->lineID,
            'msby_mail' => $request->msby_mail,
            'original_mail' => $request->original_mail,
            'zipcode' => $request->zipcode,
            'address' => $request->address,
            'mansion_name' => $request->mansion_name,
            'r_zipcode' => $request->r_zipcode,
            'resident_card' => $request->resident_card,
            'r_mansion_name' => $request->r_mansion_name,
            'emergency_name' => $request->emergency_name,
            'relationship' => $request->relationship,
            'emergency' => $request->emergency,
            'e_zipcode' => $request->e_zipcode,
            'emergency_address' => $request->emergency_address,
            'e_mansion_name' => $request->e_mansion_name,
            'birthday' => $birthday,
            'hire' => $hire,
            'legal_hire' => $legal_hire,
            'employee_number' => $request->employee_number,
            'licence' => $request->licence
        ]);

        // 保存
        $user->save();

        //【雇用形態がその他以外なら】個別売上配分表のjsonArrayに追加
        if($request->contract_type != 4){
            //①全データを引っ張ってくる
            $allDatas = Commissions::all();

            //②jsonArrayの最後に$jsonArray[$list] = ['rate' => 0, 'price' => 0];を追加
            $userArray = [$request->input('name') => ['rate' => 0, 'price' => 0]];
            if(isset($allDatas)){
                foreach($allDatas as $data){
                    // $data->receiver_percent[$request->input('name')] = ['rate' => 0, 'price' => 0];
                    $add = array_merge($data->receiver_percent, $userArray);
                    $data->fill(['receiver_percent' => $add])->save();
                }
            }
        }

        // リダイレクト
        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        return redirect()->route('root.signup', compact('now_year', 'now_month', 'now_day'));
    }

/*
|--------------------------------------------------------------------------
| ログイン処理
|--------------------------------------------------------------------------
*/

// ログイン
    public function postLogin(Request $request){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        $this->validate($request,[
        'loginID' => 'required',
        'password' => 'required|min:6'
        ]);
            if(Auth::attempt(['loginID' => $request->input('loginID'), 'password' => $request->input('password')])){
                //セッションに今日の日付を入れる
                session()->put(['year' => $year, 'month' => $month, 'day' => $day]);
                //セッションに顧客情報検索用keyを入れる
                session()->put(['cDataName' => '']);
                //管理者ログイン
                return redirect()->route('getTop');
            }

        return redirect()->back();
    }


/*
|--------------------------------------------------------------------------
| ログアウト処理
|--------------------------------------------------------------------------
*/
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
