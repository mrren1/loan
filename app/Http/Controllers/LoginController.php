<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support;
use Illuminate\Support\Facades\Input;
use App\Http\Models\User;

class LoginController extends Controller
{
	/**
	 * 用户登陆
	 * @param index
	 */
	public function index()
	{

		return view('login');
	}

	/**
	 * 注册用户
	 * @param register
	 */
	public function register(Request $request)
	{
		if($_POST)
	    {
	        $rules = ['captcha' => 'required|captcha'];
	        $validator = Validator::make(Input::all(), $rules);
	        if ($validator->fails())
	        {
	        	echo "<script>alert('验证码错误');location.href='register'</script>";
	           	exit;
	        }

	        $this->validate($request, [
		        'user_name' => 'required|max:255',
		        'user_pwd' => 'required|min:8',
		    ]);

			$user = new User;
			$user->user_name = $request['user_name'];
			$user->user_pwd = encrypt($request['user_pwd']);
			$user->user_photo = 'kdsfdsjkfdsjf';
			$user->last_time = time();
			$info = $user->save();
			if($info){
				return redirect()->action('IndexController@index');
			}
	    }else{
	    	return view('reg');
	    }	
	}
	
}
