<?php

namespace App\Http\Controllers\fronted;

use App\Login;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Models\User;

class LoginController extends Controller
{
	//登陆
	public function index()
	{
		return view('fronted/login');
	}

	//注册
	public function regist()
	{
		return view('fronted/reg');
	}

	/**
	 * 注册用户
	 */
	public function register(Request $request)
	{
		$models = new User();
		$data['user_name'] = $request->input('user_name');
		$data['user_pwd'] = encrypt($request['user_pwd'])
		$data['user_photo'] = 'kdsfdsjkfdsjf';
		$data['last_time'] = time();
		$info = $models->addOne($data);
		echo $info;
		// if($info){
		// 	return view('fronted/index');
		// }
	}
	
}
