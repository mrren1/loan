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
Route::any('debt', 'fronted\OfferController@index');
//用户唯一性
Route::get('register_only', 'fronted\LoginController@register_only');


//注册用户

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
Route::any('showLog','fronted\MemberPayController@showLog');
Route::post('upload', 'fronted\MemberInfoController@upload');
Route::post('fang_upload', 'fronted\MemberInfoController@fang_upload');
Route::post('jia_upload', 'fronted\MemberInfoController@jia_upload');
Route::post('img_upload', 'fronted\MemberInfoController@img_upload');
Route::post('id_upload', 'fronted\MemberInfoController@id_upload');
Route::post('user_upload', 'fronted\MemberInfoController@user_upload');



//后台登陆
Route::any('admin_login/','backend\LoginController@index');
//首页
Route::get('admin_index/','backend\AdminController@index');
Route::get('welcome','backend\AdminController@welcome');
Route::group(['middleware'=>['checkuser','dealuser']],function(){

	   
	Route::any('powerlist','backend\RbacController@admin_power_list');   //权限列表
	Route::any('setpower','backend\RbacController@setPower');    //分配权限
	Route::any('getpower','backend\RbacController@admin_get_power');    //设置权限
	Route::any('role_add','backend\RbacController@admin_role_add');
	Route::any('permission','backend\RbacController@admin_permission');   //角色列表
	Route::any('permission_add','backend\RbacController@admin_permission_add');
	Route::any('admin_add','backend\RbacController@admin_add');
	Route::any('admin_power','backend\RbacController@admin_power');
	Route::any('role_premission','backend\RbacController@role_premission');
	Route::any('setrole','backend\RbacController@setrole');
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
	Route::post('addpower', 
	[
	    'uses'=>'backend\PurseController@admin_add_power',
	    'as'=>'addpower',
	]);
});
//权限管理
Route::any('powerlist','backend\RbacController@admin_power_list');   //权限列表
Route::any('delrole','backend\RbacController@deleteRole'); //删除角色
Route::any('delnode','backend\RbacController@deleteNode'); //删除权限
Route::any('deladmin','backend\RbacController@deleteAdmin'); //删除管理员
Route::any('setpower','backend\RbacController@setPower');    //分配权限
Route::any('getpower','backend\RbacController@admin_get_power');    //设置权限
Route::any('role_add','backend\RbacController@admin_role_add');
Route::any('permission','backend\RbacController@admin_permission');   //角色列表
Route::any('permission_add','backend\RbacController@admin_permission_add');
Route::any('admin_add','backend\RbacController@admin_add');
Route::any('addpower','backend\RbacController@admin_add_power');    //添加权限
Route::any('admin_add_any','backend\RbacController@admin_add_any');   //添加管理员列表
Route::any('add_admin','backend\RbacController@add_admin');   //添加管理员列表
Route::any('admin_power','backend\RbacController@admin_power');
Route::any('role_premission','backend\RbacController@role_premission');
Route::any('setrole','backend\RbacController@setrole');
//会员管理
Route::any('member_list','backend\MemberController@member_list');
Route::any('member_sign','backend\MemberController@member_sign');
Route::any('sign_add','backend\MemberController@sign_add');
Route::get('admin_out', 'backend\LoginController@quit');
//广告管理
Route::any('ad_list','backend\AdController@ad_list');
Route::any('ad_add','backend\AdController@ad_add');
//贷款管理
Route::any('loan_list','backend\LoanController@loan_list');
//资金管理
Route::any('purse_list','backend\PurseController@purse_list');
/* 
this is 会员审核相关
*/
Route::any('admin_member_msg','backend\memberController@admin_member_msg'); //新会员 照片信息审核
Route::any('admin_member_stop','backend\memberController@admin_member_stop'); //新会员 照片信息状态改为 未审核
Route::any('admin_member_start','backend\memberController@admin_member_start'); //新会员 照片信息改为 审核通过
Route::any('admin_mpm_status','backend\memberController@admin_mpm_status'); //新会员 照片       填写审核状态页
Route::any('admin_mpm_status_do','backend\memberController@admin_mpm_status_do'); //新会员 照片 审核状态入库

/*
this is 贷款列表 
 */
Route::any('admin_loan_list','backend\SetloanController@admin_loan_list'); //贷款列表 
Route::any('admin_status_pass','backend\SetloanController@admin_status_pass'); //修改贷款成功状态 
Route::any('admin_offer_list','backend\OfferController@admin_offer_list'); //借款列表 
Route::any('admin_loan_list_stop','backend\SetloanController@admin_loan_list_stop'); //后台哦    贷款列表  审核通过
Route::any('admin_loan_list_start','backend\SetloanController@admin_loan_list_start'); //后台哦  贷款列表  审核为通过


Route::post('addpower', 
[
    'uses'=>'backend\PurseController@admin_add_power',
    'as'=>'addpower',
]);

//ajax计算利息
Route::any('arithmetic','fronted\OfferController@arithmetic');

//添加借款申请
Route::any('adddebt','fronted\OfferController@adddebt');

