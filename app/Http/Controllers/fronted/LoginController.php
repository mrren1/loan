<?php

namespace App\Http\Controllers\fronted;

use App\Login;
<<<<<<< HEAD:app/Http/Controllers/LoginController.php
=======
use App\Http\Controllers\fronted\Controller;
>>>>>>> 5f050a228426feec49b38c39634e3a969756949c:app/Http/Controllers/fronted/LoginController.php
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
<<<<<<< HEAD:app/Http/Controllers/LoginController.php

		return view('login');
=======
		return view('fronted/login');
	}

	//注册
	public function regist()
	{
		return view('fronted/reg');
>>>>>>> 5f050a228426feec49b38c39634e3a969756949c:app/Http/Controllers/fronted/LoginController.php
	}

	/**
	 * 注册用户
	 * @param register
	 */
	public function register(Request $request)
	{
<<<<<<< HEAD:app/Http/Controllers/LoginController.php
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
=======
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
>>>>>>> 5f050a228426feec49b38c39634e3a969756949c:app/Http/Controllers/fronted/LoginController.php
	}
	
}
