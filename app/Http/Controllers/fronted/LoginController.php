<?php

namespace App\Http\Controllers\fronted;

use App\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\fronted\Controller;
use Validator;
use Illuminate\Support;
use Illuminate\Support\Facades\Input;
use App\Http\Models\User;
use App\Http\Models\log;
use session;

class LoginController extends Controller
{
	/**
	 * 用户登录
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function login(Request $request)
	{
        if($request->isMethod('POST')){
        	$userInfo=user::where("user_name",$request['username'])
        	->first();
        	if(empty($userInfo)){
        		return redirect('prompt')->with(['message'=>'用户名错误！','url' =>'register', 'jumpTime'=>2,'status'=>false]);
	           	exit;
        	}else{
        		$userInfo=$userInfo->toArray();
        		if($request['pwd']==decrypt($userInfo['user_pwd'])){
        			$request->session()->put('user_id',$userInfo['user_id']);
        			$request->session()->put('user_name',$userInfo['user_name']);
        			return redirect('prompt')->with(['message'=>'登陆成功！正在跳转……','url' =>'index', 'jumpTime'=>2,'status'=>false]);
	           		exit;
	        	}else{
	        		return redirect('prompt')->with(['message'=>'密码错误！','url' =>'login', 'jumpTime'=>2,'status'=>false]);
	           		exit;
	        	}
        	}
        }else{
        	return view('fronted/Login/login');
        }
	}

	/**
	 * 用户退出
	 */
	public function quit(Request $request)
	{
		$request->session()->forget('user_name');
		return redirect('prompt')->with(['message'=>'退出成功','url' =>'index', 'jumpTime'=>3,'status'=>false]);
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
	        	return redirect('prompt')->with(['message'=>'验证码错误','url' =>'register', 'jumpTime'=>3,'status'=>false]);
	        }


	        $this->validate($request, [
		        'user_name' => ["regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{2,8}$/u",'required'],
		        'user_pwd' => ['regex:/^[_a-zA-Z0-9]{6,18}$/u','required'],
		    ]);
		    // echo 1;
		    // die;
		    // $preg_user_name = '/^[\u4e00-\u9fa5_a-zA-Z0-9]{2,8}$';
		    // $preg_user_pwd = '/^[_a-zA-Z0-9]{6,16}$';
		    
		    // if(preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{2,8}$/u" , $request['user_name'])){
		    // 	echo 1;
		    // }
		    

			$user = new User;
			$user->user_name = $request['user_name'];
			$user->user_pwd = encrypt($request['user_pwd']);
			$user->user_photo = 'kdsfdsjkfdsjf';
			$user->last_time = time();
			$info = $user->save();
			$user_id=$user->id;
			if($info){
				$request->session()->put('user_name',$user->user_name);
				$request->session()->put('user_id',$user_id);
				return redirect()->action('fronted\IndexController@index');
			}
	    }else{
	    	return view('fronted.Login.reg');
	    }	
	}
	/**
	 * 验证唯一性
	 * @param register_only
	 */
	public function register_only(Request $request,$username='')
	{
		$post = $request->get('name');
		$userInfo=user::where("user_name",$post)
        	->first();
     	if($userInfo){
     		echo 1;
     	}else{
     		echo 0;
     	}

	}

}
