<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','fronted\IndexController@index');


//页面控制提示并跳转
Route::resource('prompt','fronted\PromptController');

Route::get('index', 'fronted\IndexController@index');
Route::get('login', 'fronted\LoginController@index');
Route::get('register', 'fronted\LoginController@register');
Route::get('market', 'fronted\MarketController@index');
//Route::get('borrow', 'BorrowController@index');
Route::get('help', 'HelpController@index');
Route::get('about', 'AboutController@index');
Route::get('member_info', 'MemberInfoController@index');
Route::get('forget', 'ForgetController@index');
Route::get('member_index', 'MemberIndexController@index');
Route::get('member_tuan', 'MemberTuanController@index');
Route::get('member_bid_record', 'MemberBidRecordController@index');
Route::get('member_bid_auto', 'MemberBidAutoController@index');
Route::get('member_trade', 'MemberTradeController@index');
Route::get('member_pay', 'MemberPayController@index');
Route::get('member_bank', 'MemberBankController@index');
Route::get('member_invite', 'MemberInviteController@index');
Route::get('address', 'fronted\MemberInfoController@getAddress');
Route::post('member_info', 'fronted\MemberInfoController@index');
Route::get('help', 'fronted\HelpController@index');
Route::get('about', 'fronted\AboutController@index');
Route::get('member_info', 'fronted\MemberInfoController@index');
Route::get('forget', 'fronted\ForgetController@index');
Route::get('member_index', 'fronted\MemberIndexController@index');
Route::get('member_tuan', 'fronted\MemberTuanController@index');
Route::get('member_bid_record', 'fronted\MemberBidRecordController@index');
Route::get('member_bid_auto', 'fronted\MemberBidAutoController@index');
Route::get('member_trade', 'fronted\MemberTradeController@index');
Route::get('member_pay', 'fronted\MemberPayController@index');
Route::get('member_bank', 'fronted\MemberBankController@index');
Route::get('out', 'fronted\LoginController@quit');
Route::get('setloan', 'fronted\SetloanController@index');
Route::any('member_mention', 'fronted\MemberPayController@member_mention');
Route::get('debt', 'fronted\OfferController@index');
Route::post('register', 
[
    'uses'=>'fronted\LoginController@register',
    'as'=>'register',
]);
Route::post('setloan', 
[
    'uses'=>'fronted\SetloanController@index',
    'as'=>'setloan',
]);
Route::post('debt', 
[
    'uses'=>'fronted\OfferController@index',
    'as'=>'debt',
]);
Route::any('log','fronted\LoginController@log');
Route::any('login','fronted\LoginController@login');
Route::get('getCreateverify', 'fronted\LoginController@getCreateverify');

Route::post('Add_bank','fronted\MemberPayController@Add_bank');
Route::post('addPut','fronted\MemberPayController@addPut');
Route::any('putSuccess','fronted\MemberPayController@putSuccess');
Route::any('chargeSuccess','fronted\MemberPayController@chargeSuccess');
Route::any('memberCharge','fronted\MemberPayController@memberCharge');



//后台登陆
Route::get('admin/','backend\LoginController@index');
//首页
Route::get('admin_index/','backend\AdminController@index');
Route::get('welcome','backend\AdminController@welcome');
//权限管理
Route::any('role','backend\PowerController@admin_role');
Route::any('role_add','backend\PowerController@admin_role_add');
Route::any('permission','backend\PowerController@admin_permission');
Route::any('permission_add','backend\PowerController@admin_permission_add');
Route::any('admin_list','backend\PowerController@admin_list');
Route::any('admin_add','backend\PowerController@admin_add');
//会员管理
Route::any('member_list','backend\MemberController@member_list');
Route::any('member_sign','backend\MemberController@member_sign');
Route::any('sign_add','backend\MemberController@sign_add');
//广告管理
Route::any('ad_list','backend\AdController@ad_list');
Route::any('ad_add','backend\AdController@ad_add');
//贷款管理
Route::any('loan_list','backend\LoanController@loan_list');
//资金管理
Route::any('purse_list','backend\PurseController@purse_list');

