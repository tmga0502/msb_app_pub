<?php

//ログイン画面Top
Route::get('/',[
  'uses' => 'UserController@getLogin',
  'as' => 'login'
]);

//緊急用サインアップ画面表示
Route::get('/e_signup',[
  'uses' => 'UserController@emargencySignup',
  'as' => 'e_signup'
]);

//緊急用サインアップ挙動
Route::post('/e_signup/new',[
  'uses' => 'UserController@eNew',
  'as' => 'e_new'
]);


/*
  |--------------------------------------------------------------------------
  | ログイン処理
  |--------------------------------------------------------------------------
*/

//ログイン認証(設備予約)
Route::post('/',[
  'uses' => 'UserController@postLogin',
  'as' => 'login.login'
  ]);


//ログイン保護
Route::group(['middleware' => 'auth'], function(){

/*
  |--------------------------------------------------------------------------
  | トップページ
  |--------------------------------------------------------------------------
*/
  // トップページ
  Route::get('/top',[
  'uses' => 'UserController@getTop',
  'as' => 'getTop'
  ]);

/*
  |--------------------------------------------------------------------------
  | サブページ
  |--------------------------------------------------------------------------
*/
  // 顧客管理ページ
  Route::get('/top/c_data',[
  'uses' => 'UserController@getCdata',
  'as' => 'getCdata'
  ]);


/*
  |--------------------------------------------------------------------------
  | 設備予約関連
  |--------------------------------------------------------------------------
*/

  // 設備予約home
  Route::get('/reserve_home',[
  'uses' => 'ReserveController@getReserveHome',
  'as' => 'reservation.home'
  ]);

  // 設備予約トップ
  Route::get('/reserve_top/{year}/{month}/{day}',[
  'uses' => 'ReserveController@getTop',
  'as' => 'reservation.top'
  ]);


  // 設備予約マイページ
  Route::get('/reserve_mypage',[
  'uses' => 'ReserveController@getMypage',
  'as' => 'reservation.mypage'
  ]);

  // 設備予約新規登録ページ
  Route::get('/reserve_create/{year}/{month}/{day}',[
  'uses' => 'ReserveController@getCreate',
  'as' => 'reservation.create'
  ]);

  // 設備予約新規登録
  Route::post('/reserve_create/new',[
  'uses' => 'ReserveController@postCreate',
  'as' => 'r_create'
  ]);

  //設備予約詳細ページ表示
  Route::get('/reserve_description/{id}',[
  'uses' => 'ReserveController@description',
  'as' => 'reservation.description'
  ]);

  // 設備予約変更
  Route::post('/reserve_description/{id}',[
  'uses' => 'ReserveController@postUpdate',
  'as' => 'r_update'
  ]);

  //設備予約削除
  Route::post('/reserve_remove/{id}',[
  'uses' => 'ReserveController@remove',
  'as' => 'r_remove'
  ]);




/*
  |--------------------------------------------------------------------------
  | コミッション請求書作成関連
  |--------------------------------------------------------------------------
*/

  // コミッション請求書作成トップ
  Route::get('/commissions/com_top',[
  'uses' => 'CommissionsController@getTop',
  'as' => 'commissions.com_top'
  ]);

  // 17口座チェックページトップ
  Route::get('/commissions/17check',[
  'uses' => 'CommissionsController@getCSV17',
  'as' => 'commissions.com_csv17'
  ]);

// 17口座チェックページ検索画面表示
Route::post('/commissions/17check/search',[
'uses' => 'CommissionsController@postSearchCSV17',
'as' => 'commissions.searchCSV17'
]);

 // 17口座チェック　更新
Route::post('/commissions/17check/update',[
'uses' => 'CommissionsController@postCSV17',
'as' => 'commissions.update_csv17'
]);

// 19口座チェックページトップ
  Route::get('/commissions/19check',[
  'uses' => 'CommissionsController@getCSV19',
  'as' => 'commissions.com_csv19'
  ]);

// 19口座チェックページ検索画面表示
Route::post('/commissions/19check/search',[
'uses' => 'CommissionsController@postSearchCSV19',
'as' => 'commissions.searchCSV19'
]);

 // 19口座チェック　更新
Route::post('/commissions/19check/update',[
'uses' => 'CommissionsController@postCSV19',
'as' => 'commissions.update_csv19'
]);

// 【まとめ】個別配分表ページトップ
Route::get('/commissions/individuals',[
'uses' => 'CommissionsController@getIndividuals',
'as' => 'commissions.individuals'
]);

// 【賃貸】個別配分表ページトップ
Route::get('/commissions/rent',[
'uses' => 'CommissionsController@getRent',
'as' => 'commissions.rent'
]);

// 【賃貸】個別配分表ページ 登録
Route::post('/commissions/rent/create',[
'uses' => 'CommissionsController@postRent',
'as' => 'commissions.rent_create'
]);

// 【売買】個別配分表ページトップ
Route::get('/commissions/trade',[
'uses' => 'CommissionsController@getTrade',
'as' => 'commissions.trade'
]);

// 【売買】個別配分表ページ 登録
Route::post('/commissions/trade/create',[
'uses' => 'CommissionsController@postTrade',
'as' => 'commissions.trade_create'
]);

// 【管理】個別配分表ページトップ
Route::get('/commissions/manage',[
'uses' => 'CommissionsController@getManage',
'as' => 'commissions.manage'
]);

// 【管理】個別配分表ページ 登録
Route::post('/commissions/manage/create',[
'uses' => 'CommissionsController@postManage',
'as' => 'commissions.manage_create'
]);

// 【現金受領・紹介料】ページトップ
Route::get('/commissions/other',[
'uses' => 'CommissionsController@getOther',
'as' => 'commissions.other'
]);

// 【現金受領・紹介料】 登録
Route::post('/commissions/other/create',[
'uses' => 'CommissionsController@postOther',
'as' => 'commissions.other_create'
]);


/*
  |--------------------------------------------------------------------------
  | 顧客管理関連
  |--------------------------------------------------------------------------
*/

 // 顧客管理トップ
 Route::get('/c_data_top',[
 'uses' => 'CustomerController@getTop',
 'as' => 'c_data.top'
 ]);

 // プロフィール画面表示
 Route::get('/profile',[
 'uses' => 'CustomerController@getProfile',
 'as' => 'c_data.profile'
 ]);

 // プロフィールupdate
Route::post('/profile/profile/update',[
'uses' => 'CustomerController@postUserDetail',
'as' => 'c_data.userDetail_update'
]);

 // 予実管理create_or_update
Route::post('/profile/budgets/update',[
'uses' => 'CustomerController@postBudgets',
'as' => 'c_data.budgets_save'
]);

  // 顧客新規登録画面表示
  Route::get('/c_data_create',[
  'uses' => 'CustomerController@getCreate',
  'as' => 'c_data.create'
  ]);

  // 顧客新規登録
  Route::post('/c_data_create/new',[
  'uses' => 'CustomerController@postCreate',
  'as' => 'c_create'
  ]);

  // 顧客一覧表示
  Route::get('/customer_list',[
  'uses' => 'CustomerController@getCustomerList',
  'as' => 'c_data.c_list'
  ]);

  // 顧客一覧->検索
  Route::post('/customer_list/search',[
  'uses' => 'CustomerController@cListSearch',
  'as' => 'c_data.cListSearch'
  ]);

  // 顧客詳細表示
  Route::get('/customer_list/{id}',[
  'uses' => 'CustomerController@getCustomerDetail',
  'as' => 'c_data.c_detail'
  ]);

  // 顧客詳細編集ページ
  // 基本情報
    Route::get('/customer_list/{id}/editBase',[
    'uses' => 'CustomerController@getCustomerDetailEditBase',
    'as' => 'c_data.editBase'
    ]);
  // 進捗・売上
    Route::get('/customer_list/{id}/editSales',[
    'uses' => 'CustomerController@getCustomerDetailEditSales',
    'as' => 'c_data.editSales'
    ]);
  // 物件情報
    Route::get('/customer_list/{id}/editProperty',[
    'uses' => 'CustomerController@getCustomerDetailEditProperty',
    'as' => 'c_data.editProperty'
    ]);
  // その他
    Route::get('/customer_list/{id}/editOther',[
    'uses' => 'CustomerController@getCustomerDetailEditOther',
    'as' => 'c_data.editOther'
    ]);

  // 顧客詳細更新
  // 基本情報
    Route::post('/customer_list/c_info',[
    'uses' => 'CustomerController@c_infoUpdate',
    'as' => 'c_info_update'
    ]);

  // 売上情報
    Route::post('/customer_list/sales',[
    'uses' => 'CustomerController@salesUpdate',
    'as' => 'sales_update'
    ]);

  // 物件情報
    Route::post('/customer_list/propertyInformation',[
    'uses' => 'CustomerController@propertyInformationUpdate',
    'as' => 'propertyInformation_update'
    ]);

  // その他情報
    Route::post('/customer_list/other',[
    'uses' => 'CustomerController@otherUpdate',
    'as' => 'other_update'
    ]);

  // 顧客詳細表示->詳細情報更新
  Route::post('/customer_list/details',[
  'uses' => 'DetailController@detailsUpdate',
  'as' => 'details_update'
  ]);

  // 見込み管理表示
  Route::get('/c_data_prospect',[
  'uses' => 'CustomerController@getProspect',
  'as' => 'c_data.prospect'
  ]);

 // 見込み管理->検索
  Route::post('/c_data_prospect/search',[
  'uses' => 'CustomerController@prospectDisp',
  'as' => 'c_data.prospectDisp'
  ]);

  // 紹介管理表示
  Route::get('/introduction',[
  'uses' => 'CustomerController@getIntroduction',
  'as' => 'c_data.introduction'
  ]);

  // 予実管理ページ表示
  Route::get('/budget_control',[
  'uses' => 'CustomerController@getBudget',
  'as' => 'c_data.budget_control'
  ]);


/*
  |--------------------------------------------------------------------------
  | 【新】管理者ツール
  |--------------------------------------------------------------------------
*/
// 管理者ツールトップ
  Route::get('/root/toppage',[
  'uses' => 'RootController@getTopPage',
  'as' => 'root.topPage'
  ]);

/***  CSV登録・一覧ページ  ***/ 
  //TOPページ
  Route::get('/root/csvTop',[
  'uses' => 'RootController@csvTop',
  'as' => 'root.csvTop'
  ]);

  //CSV登録
  Route::post('/root/csv',[
  'uses' => 'CsvController@uploadCsv',
  'as' => 'root.csv_upload'
  ]);

/*
  |--------------------------------------------------------------------------
  | 【旧】管理者ツール
  |--------------------------------------------------------------------------
*/

  // 管理者ツールトップ
  Route::get('/root/top/{year}/{month}/{day}',[
  'uses' => 'RootController@getTop',
  'as' => 'root.top'
  ]);

// 振り込み額一覧画面表示
 Route::get('/root/transferList/{year}/{month}/{day}',[
 'uses' => 'RootController@getTransferList',
 'as' => 'root.transferList'
 ]);

// CSV一覧画面表示
 Route::get('/root/csv/{year}/{month}/{day}',[
 'uses' => 'RootController@getCsv',
 'as' => 'root.csv'
 ]);

 

 //CSV過去分表示
 Route::get('/root/backnumber/{b_number}/{year}/{month}',[
 'uses' => 'RootController@bacNumberCsv',
 'as' => 'root.csv_backnumber'
 ]);

  // CSV情報　更新
Route::post('/root/update/csv',[
'uses' => 'RootController@postCSV',
'as' => 'root.update_csv'
]);

 // 経費一覧画面表示
 Route::get('/root/expense_list/{year}/{month}/{day}',[
 'uses' => 'RootController@geteListEpense',
 'as' => 'root.expense_list'
 ]);


 // 経費登録画面表示
 Route::get('/root/expense_create/{year}/{month}/{day}',[
   'uses' => 'RootController@geteCreateEpense',
   'as' => 'root.expense_create'
   ]);


// 経費登録
Route::post('/root/expense_create/new',[
  'uses' => 'RootController@postCreateEpense',
'as' => 'root.expense_create_new'
]);

// 経費登録一覧検索画面表示
Route::post('/root/expense_create/search',[
'uses' => 'RootController@postSearchExpense_create',
'as' => 'root.searchExpense_create'
]);

// 正規雇用賃金台帳
Route::get('/root/wageLedger/{year}/{month}/{day}',[
  'uses' => 'RootController@getWageLedger',
'as' => 'root.wageLedger'
]);

//signUp画面
Route::get('/root/signup',[
  'uses' => 'UserController@getSignup',
  'as' => 'root.signup'
]);

//signUp挙動
Route::post('/root/signup/create',[
'uses' => 'UserController@postSignup',
'as' => 'root.signup_new'
]);

// ユーザー一覧
Route::get('/root/userList',[
'uses' => 'RootController@getUserList',
'as' => 'root.userList'
]);

// ユーザー詳細
Route::get('/root/userDetail/detail/{id}',[
'uses' => 'RootController@getUserDetail',
'as' => 'root.userDetail'
]);

// ユーザー詳細update
Route::post('/root/userDetail/detail/update',[
'uses' => 'RootController@postUserDetail',
'as' => 'root.userDetail_update'
]);


/*
  |--------------------------------------------------------------------------
  | 労働時間管理
  |--------------------------------------------------------------------------
*/

  // 労働時間管理トップ
  Route::get('/workTime/top/{year}/{month}/{day}',[
  'uses' => 'WorkTimeController@getTop',
  'as' => 'workTime.top'
  ]);

  // 労働時間管理一覧
  Route::get('/workTime/list/{year}/{month}/{day}',[
  'uses' => 'WorkTimeController@getList',
  'as' => 'workTime.list'
  ]);

  //労働時間登録
 Route::post('/workTime/top/create',[
 'uses' => 'WorkTimeController@create',
 'as' => 'workTime.create'
 ]);

/*
  |--------------------------------------------------------------------------
  | ログアウト処理
  |--------------------------------------------------------------------------
*/
  // ログアウト
  Route::get('/logout',[
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout'
  ]);

});
