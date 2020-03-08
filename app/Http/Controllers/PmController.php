<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Pms;
use App\PmCheck;
use App\Owners;
use Carbon\Carbon;

class PmController extends Controller
{


/*
  |--------------------------------------------------------------------------
  | Topページ表示
  |--------------------------------------------------------------------------
*/
    public function getTop(){
        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        return view('pm.top',compact('now_year', 'now_month', 'now_day'));
    }


/*
  |--------------------------------------------------------------------------
  | 物件登録ページ表示
  |--------------------------------------------------------------------------
*/
    public function getCreate(){
        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        $ownerList=[];
        $ownerName = Owners::all();
        foreach($ownerName as $list){
            $name = ($list->corporate_name == '' ) ? $list->owner_name : $list->corporate_name;
            $id = $list->id;
            $ownerList[$id] = $name;
        }

        // フォーム配列（一棟用）
        $groupForm = ['該当無し'];
        $p_group = Pms::whereNotNull('property_group')->groupBy('property_group')->get('property_group')->ToArray();
        foreach($p_group as $group){
            $groupForm[] = $group['property_group'];
        }
        // dd($groupForm);
        // $ownerList[] = $ownerName->
        return view('pm.create',compact('now_year', 'now_month', 'now_day', 'ownerList', 'groupForm'));
    }

/*
  |--------------------------------------------------------------------------
  | 物件更新処理
  |--------------------------------------------------------------------------
*/
    public function postUpdate(Request $request){
        // バリデーション
        $this->validate($request,[
        'property_name' => 'required',
        'room_number' => 'required',
        'owner_name' => 'required'
        ]);

        $id = $request->id;

        // DBインサート
        $update = [
            'property_name' => $request->property_name,
            'room_number' => $request->room_number,
            'status' => $request->status,
            'owner_name' => $request->owner_name,
            'pm_fee' => $request->pm_fee,
            'cycle' => $request->cycle,
            'transfer_date' => $request->transfer_date,
            'tenant_name' => $request->tenant_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'rent' => $request->rent,
            'cs_fee' => $request->cs_fee,
            'deposit' => $request->deposit,
            'person' => $request->person,
            'transfer_name' => $request->transfer_name
        ];

        // 保存
        Pms::find($id)->fill($update)->save();


        return redirect()->route('pm.detail', ['id' => $id]);
    }


/*
  |--------------------------------------------------------------------------
  | 物件登録処理
  |--------------------------------------------------------------------------
*/
    public function postCreate(Request $request){
        // バリデーション
        $this->validate($request,[
        'property_name' => 'required',
        'room_number' => 'required',
        'owner_name' => 'required'
        ]);

        if($request->owner_name == '新規作成'){
            $owner_name = $request->owners_name;

            $owner = new Owners ([
                'corporate_name' => $request->corporate_name,
                'owner_name' => $request->owners_name,
                'first_code' => $request->first_code,
                'last_code' => $request->last_code,
                'prefecture' => $request->prefecture,
                'city' => $request->city,
                'address' => $request->address,
                'tel' => $request->tel,
                'phone' => $request->phone,
                'bank' => $request->bank,
                'bank_branch' => $request->bank_branch,
                'bank_type' => $request->bank_type,
                'bank_number' => $request->bank_number,
                'pay_name' => $request->pay_name
            ]);
            // 保存
            $owner->save();
            // DBインサート
            if($request->property_group == '該当なし'){
                $property_group = $request->new_property_group;
            }else{
                $property_group = $request->property_group;
            }
            $start = ($request->start_day == '') ? null : $request->start_day;
            $end = ($request->end_day == '') ? null : $request->end_day;
            $cs_fee = ($request->cs_fee == '') ? 0 : $request->cs_fee;
            $pm = new Pms([
                'owners_id' => $owner->id,
                'property_name' => $request->property_name,
                'room_number' => $request->room_number,
                'property_group' => $property_group,
                'status' => $request->status,
                'owner_name' => $owner_name,
                'pm_fee' => $request->pm_fee,
                'cycle' => $request->cycle,
                'transfer_date' => $request->transfer_date,
                'tenant_name' => $request->tenant_name,
                'start_date' => $start,
                'end_date' => $end,
                'rent' => $request->rent,
                'cs_fee' => $cs_fee,
                'deposit' => $request->deposit,
                'person' => $request->person,
                'transfer_name' => $request->transfer_name
            ]);
            // 保存
            $pm->save();
        }else{
            $owner_name = $request->owner_name;
            if($request->property_group == '該当無し'){
                $property_group = $request->new_property_group;
            }else{
                $property_group = $request->property_group;
            }
            $start = ($request->start_day == '') ? null : $request->start_day;
            $end = ($request->end_day == '') ? null : $request->end_day;
            $cs_fee = ($request->cs_fee == '') ? 0 : $request->cs_fee;
            // DBインサート
            $pm = new Pms([
                'owners_id' => $request->owner_name,
                'property_name' => $request->property_name,
                'room_number' => $request->room_number,
                'property_group' => $property_group,
                'status' => $request->status,
                'owner_name' => $owner_name,
                'pm_fee' => $request->pm_fee,
                'cycle' => $request->cycle,
                'transfer_date' => $request->transfer_date,
                'tenant_name' => $request->tenant_name,
                'start_date' => $start,
                'end_date' => $end,
                'rent' => $request->rent,
                'cs_fee' => $cs_fee,
                'deposit' => $request->deposit,
                'person' => $request->person,
                'transfer_name' => $request->transfer_name
            ]);
            // 保存
            $pm->save();
        }


        return redirect()->route('pm.create');
    }

/*
  |--------------------------------------------------------------------------
  | 管理物件一覧
  |--------------------------------------------------------------------------
*/
    public function getList(){
        $list = Pms::all();
// dd($list);
        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        return view('pm.list',compact('now_year', 'now_month', 'now_day', 'list'));
    }


/*
  |--------------------------------------------------------------------------
  | 物件検索
  |--------------------------------------------------------------------------
*/
    public function postListSearch(Request $request){
        if($request->has('serch')){
            $str = $request->search;
            $list = Pms::where('property_name', 'LIKE', "%$str%")->get();
        }else{
            $list = Pms::all();
        }

        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        return view('pm.list',compact('now_year', 'now_month', 'now_day', 'list'));
    }

/*
  |--------------------------------------------------------------------------
  | 管理物件詳細
  |--------------------------------------------------------------------------
*/
    public function getDetail($id){
        $list = Pms::find($id);
        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        // フォーム配列（一棟用）
        $groupForm = ['該当無し'];
        $p_group = Pms::whereNotNull('property_group')->groupBy('property_group')->get('property_group')->ToArray();
        foreach($p_group as $group){
            $groupForm[] = $group['property_group'];
        }

        return view('pm.detail',compact('now_year', 'now_month', 'now_day', 'list', 'groupForm'));
    }


/*
  |--------------------------------------------------------------------------
  | オーナー一覧
  |--------------------------------------------------------------------------
*/
    public function getOwnersList(){
        $list = Owners::all();

        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        return view('pm.ownersList',compact('now_year', 'now_month', 'now_day', 'list'));
    }

/*
  |--------------------------------------------------------------------------
  | オーナー詳細
  |--------------------------------------------------------------------------
*/
    public function getOwnersDetail($id){
        $list = Owners::with('pms')->find($id);
        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        // dd($list);
        return view('pm.ownersDetail',compact('now_year', 'now_month', 'now_day', 'list'));
    }

/*
  |--------------------------------------------------------------------------
  | オーナー情報更新処理
  |--------------------------------------------------------------------------
*/
    public function postOwnerUpdate(Request $request){

        $id = $request->id;
        $corporate_name = (empty($request->corporate_name)) ? '' : $request->corporate_name;

        // DBインサート
        $update = [
            'corporate_name' => $corporate_name,
            'owner_name' => $request->owners_name,
            'first_code' => $request->first_code,
            'last_code' => $request->last_code,
            'prefecture' => $request->prefecture,
            'city' => $request->city,
            'address' => $request->address,
            'tel' => $request->tel,
            'phone' => $request->phone,
            'bank' => $request->bank,
            'bank_branch' => $request->bank_branch,
            'bank_type' => $request->bank_type,
            'bank_number' => $request->bank_number,
            'pay_name' => $request->pay_name
        ];

        // 保存
        Owners::find($id)->fill($update)->save();


        return redirect()->route('pm.ownersDetail', ['id' => $id]);
    }

/*
  |--------------------------------------------------------------------------
  | 入金チェックページ
  |--------------------------------------------------------------------------
*/
    public function getCheck($year, $month){
        $dt = Carbon::now();
        $now_year = $year;
        $now_month = $month;
        $now_day = $dt->day;
        $pmLists = Pms::where('status', '=', 1)->get();
        foreach($pmLists as $pmlist){
            $id = $pmlist->id;
            //存在チェック
            $flag = Pms::whereHas('check' , function($query) use($id, $now_year, $now_month) {
            $query->where('pms_id','=', $id)
                  ->where('payYear','=', $now_year)
                  ->where('payMonth','=', $now_month);
            })->where('status', '=', 1)->exists();
            //faluseならcreate
            if($flag == false){
                $createList = [
                    'pms_id' => $id,
                    'payYear' => $now_year,
                    'payMonth' => $now_month,
                    'person_check' => null,
                    'clerk_check' => null,
                    'transfer_date' => null,
                    'remark' => '',
                ];
                PmCheck::insert($createList);
            }
        }

        $lists = PmCheck::with('pms')->where('payYear','=', $now_year)
                  ->where('payMonth','=', $now_month)->get();

        // dd($checkLists[0]->pms->id);

        return view('pm.check',compact('now_year', 'now_month', 'now_day', 'lists'));
    }

/*
  |--------------------------------------------------------------------------
  | 入金チェック更新
  |--------------------------------------------------------------------------
*/
    public function postCheck(Request $request){
        $year = $request->year;
        $month = $request->month;
        $q = Pms::with('check')->whereHas('check' , function($query) use($year, $month) {
            $query->where('payYear','=', $year)
                  ->where('payMonth','=', $month);
        })->where('status', '=', 1);
        $count = $q->count();

        for($i = 0; $i < $count ; $i++){
            $id = $request->id[$i];
            $person_check = ($request->person_check[$i] == "") ? null : $request->person_check[$i];
            $clerk_check = ($request->clerk_check[$i] == "") ? null : $request->clerk_check[$i];
            $remittance_date = ($request->remittance_date[$i] == "") ? null : $request->remittance_date[$i];
            $transfer_date = ($request->transfer_date[$i] == "") ? null : $request->transfer_date[$i];
            $remark = $request->remark[$i];

            $update = [
                'person_check' => $person_check,
                'clerk_check' => $clerk_check,
                'remittance_date' => $remittance_date,
                'transfer_date' => $transfer_date,
                'remark' => $remark,
            ];
            PmCheck::find($id)->fill($update)->save();
        }


        return redirect()->route('pm.check', compact('year', 'month'));
    }

/*
  |--------------------------------------------------------------------------
  | 入金チェック検索
  |--------------------------------------------------------------------------
*/
    public function postCheckSearch(Request $request){
        $dt = Carbon::now();
        if($request->has('serch')){
            if($request->search == ''){
                $year = $dt->year;
                $month = $dt->month;
            }else{
                $year = substr($request->search, 0, 4);
                if(substr($request->search, 5, 1) == 0){
                    $month = substr($request->search, 6, 2);
                }else{
                    $month = substr($request->search, 5, 2);
                }
            }
        }else{
            $year = $dt->year;
            $month = $dt->month;
        }



        return redirect()->route('pm.check', compact('year', 'month'));
    }


/*
  |--------------------------------------------------------------------------
  | 振込明細作成物件一覧
  |--------------------------------------------------------------------------
*/
    public function getTrDetails(){
        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        $start_day = $now_year . '-' . $now_month .'-1';
        $end_day = $now_year . '-' . $now_month .'-31';

        $lists = PmCheck::whereBetween('transfer_date', [$start_day, $end_day])->with('pms')
        ->get();
        // dd($lists[0]);

        return view('pm.tr_details',compact('now_year', 'now_month', 'now_day', 'lists'));
    }

/*
  |--------------------------------------------------------------------------
  | 振込明細作成ページ
  |--------------------------------------------------------------------------
*/
    public function getSpNew($id){
        $dt = Carbon::now();
        $now_year = $dt->year;
        $now_month = $dt->month;
        $now_day = $dt->day;
        $list = PmCheck::with(['pms' => function($query){
            $query->with('owners');
        }])->find($id);
        // dd($list);
        return view('pm.sp_new', compact('now_year', 'now_month', 'now_day', 'list'));
    }

/*
  |--------------------------------------------------------------------------
  | 振込明細表示
  |--------------------------------------------------------------------------
*/
    public function getSpecification($id){
        // $list = Pms::with('owners')->find($id);
        $list = PmCheck::with(['pms' => function($query){
            $query->with('owners');
        }])->find($id);
        // dd($list);
        return view('pm.specification', compact('list'));
    }


}
