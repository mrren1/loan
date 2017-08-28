<?php

namespace App\Http\Controllers;

use App\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Models\User;

class LoginController extends Controller
{
	//登陆
	public function index()
	{
		return view('login');
	}

	//注册
	public function regist()
	{
		return view('reg');
	}

	/**
	 * 注册用户
	 */
	public function register(Request $request)
	{
		$user = new User;
		$user->user_name = $request['user_name'];
		$user->user_pwd = encrypt($request['user_pwd']);
		$user->user_photo = 'kdsfdsjkfdsjf';
		$user->last_time = time();
		$info = $user->save();
		echo $info;
		// if($info){
		// 	return view('index');
		// }
	}
	
}
