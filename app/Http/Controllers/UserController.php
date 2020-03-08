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
    public function getLoginReserve(){
     return view('login.loginTop');
    }

/*
|--------------------------------------------------------------------------
| 雇用形態別Top
|--------------------------------------------------------------------------
*/
    //業務委託トップ
    public function getAgentTop(){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        return view('Top.agent', compact('year', 'month', 'day'));
    }

    //正社員トップ
    public function getEmployeeTop(){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        return view('Top.employee', compact('year', 'month', 'day'));
    }

    //管理者トップ
    public function getManagerTop(){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        return view('Top.manager', compact('year', 'month', 'day'));
    }



/*
|--------------------------------------------------------------------------
| サインアップ画面
|--------------------------------------------------------------------------
*/
    public function getSignup($year, $month, $day){
        $now_year = $year;
        $now_month = $month;
        $now_day = $day;
        return View('root.signup', compact('now_year', 'now_month', 'now_day'));
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
        if($request->birthday == ""){
         $birthday = null;
        }else{
         $birthday = $request->birthday;
        }
        if($request->hire == ""){
         $hire = null;
        }else{
         $hire = $request->hire;
        }
        if($request->legal_hire == ""){
         $legal_hire = null;
        }else{
         $legal_hire = $request->legal_hire;
        }
        // DBインサート
        $user = new User([
            'name' => $request->input('name'),
            'loginID' => $request->input('loginID'),
            'password' => bcrypt($request->input('password')),
            'contract_type' => $request->contract_type,
            'bank' => $request->bank,
            'bank_branch' => $request->bank_branch,
            'bank_type' => $request->bank_type,
            'bank_number' => $request->bank_number,
            'tel' => $request->tel,
            'lineID' => $request->lineID,
            'msby_mail' => $request->msby_mail,
            'original_mail' => $request->original_mail,
            'address' => $request->address,
            'resident_card' => $request->resident_card,
            'emergency_name' => $request->emergency_name,
            'relationship' => $request->relationship,
            'emergency' => $request->emergency,
            'emergency_address' => $request->emergency_address,
            'birthday' => $birthday,
            'hire' => $hire,
            'legal_hire' => $legal_hire,
            'employee_number' => $request->employee_number,
            'virus_soft' => $request->virus_soft,
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
    public function postLoginReserve(Request $request){
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        $this->validate($request,[
        'loginID' => 'required',
        'password' => 'required|min:6'
        ]);
            if(Auth::attempt(['loginID' => $request->input('loginID'), 'password' => $request->input('password'), 'superUser' => 1])){
                //セッションに今日の日付を入れる
                session()->put(['year' => $year, 'month' => $month, 'day' => $day]);
                //管理者ログイン
                return redirect()->route('manager.top');
            }
            elseif(Auth::attempt(['loginID' => $request->input('loginID'), 'password' => $request->input('password'), 'superUser' => 0, 'contract_type' => 0])){
                //セッションに今日の日付を入れる
                session()->put(['year' => $year, 'month' => $month, 'day' => $day]);
                //業務委託ログイン
                return redirect()->route('agent.top');
            }
            elseif(Auth::attempt(['loginID' => $request->input('loginID'), 'password' => $request->input('password'), 'superUser' => 0, 'contract_type' => 1])){
                //セッションに今日の日付を入れる
                session()->put(['year' => $year, 'month' => $month, 'day' => $day]);
                //正社員ログイン
                return redirect()->route('agent.top');
            }
            elseif(Auth::attempt(['loginID' => $request->input('loginID'), 'password' => $request->input('password'), 'superUser' => 0, 'contract_type' => 2])){
                //セッションに今日の日付を入れる
                session()->put(['year' => $year, 'month' => $month, 'day' => $day]);
                //正社員ログイン
                return redirect()->route('employee.top');
            }
            elseif(Auth::attempt(['loginID' => $request->input('loginID'), 'password' => $request->input('password'), 'superUser' => 0, 'contract_type' => 3])){
                //セッションに今日の日付を入れる
                session()->put(['year' => $year, 'month' => $month, 'day' => $day]);
                //正社員ログイン
                return redirect()->route('employee.top');
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
        return redirect()->route('login_reserve');
    }

}
