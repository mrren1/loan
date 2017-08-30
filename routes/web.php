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

Route::get('/','IndexController@index');

Route::get('index', 'IndexController@index');
Route::get('login', 'LoginController@index');
Route::get('regist', 'LoginController@regist');
Route::get('market', 'MarketController@index');
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
Route::get('address', 'MemberInfoController@getAddress');
Route::get('upload', 'MemberInfoController@upload');
Route::post('member_info', 'MemberInfoController@index');