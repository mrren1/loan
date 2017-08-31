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


//我是后台  个人用户相关
//后台登陆
Route::any('admin/','backend\LoginController@index');

Route::get('adminuser', 'backend\UserController@index');         	//个人主页
Route::get('adminuser_info', 'backend\UserController@userinfo');    //个人资料
Route::get('adminuser_uaac', 'backend\UserController@user_uaac');   //认证管理
Route::get('adminuser_ra', 'backend\UserController@user_ra');       //推荐有奖
Route::get('adminuser_pwd', 'backend\UserController@user_pwd');     //密码设置

Route::get('adminuser_mr', 'backend\UserController@user_mr'); 		//资金记录		
Route::get('adminuser_pay_rank', 'backend\UserController@user_pay_rank'); //充值记录
Route::get('adminuser_wr', 'backend\UserController@user_wr');       //提现记录
Route::get('adminuser_tph', 'backend\UserController@user_tph');   	//三方托管

Route::get('adminuser_mi', 'backend\UserController@user_mi');		//我的投资
Route::get('adminuser_crt', 'backend\UserController@user_crt');		//债权转让
Route::get('adminuser_ab', 'backend\UserController@user_ab'); 		//自动投标
Route::get('adminuser_fs', 'backend\UserController@user_fs');       //理财统计

Route::get('adminuser_my_loan', 'backend\UserController@user_my_loan');   //我的贷款
Route::get('adminuser_trtl', 'backend\UserController@user_trtl');   //偿还贷款
Route::get('adminuser_ls', 'backend\UserController@user_ls'); 		//债款统计
