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

Route::post('Add_bank','fronted\MemberPayController@Add_bank');
Route::post('putOur','fronted\MemberPayController@putOur');

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
Route::any('member_mention', 'fronted\MemberPayController@member_mention');
Route::post('register', 
[
    'uses'=>'fronted\LoginController@register',
    'as'=>'register',
]);

Route::any('log','fronted\LoginController@log');
Route::get('getCreateverify', 'fronted\LoginController@getCreateverify');

