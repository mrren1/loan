<?php

namespace App\Http\Controllers\fronted;

use App\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\fronted\Controller;
use Validator;
use Illuminate\Support;
use Illuminate\Support\Facades\Input;
use App\Http\Models\User;
use App\Http\Models\Purse;
use App\Http\Models\Message;
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
        	$userInfo=user::where("user_name",$request['username'])->first();
        	if(empty($userInfo)){
        		$result = [
        			'message'=>'用户名错误！',
        			'url' =>'register', 
        			'jumpTime'=>2,
        			'status'=>false
        		]; 	
        	}else{
        		$userInfo=$userInfo->toArray();
        		if($request['pwd']==decrypt($userInfo['user_pwd'])){
        			$request->session()->put('user_id',$userInfo['user_id']);
        			$request->session()->put('user_name',$userInfo['user_name']);
        			$result = [
        				'message'=>'登陆成功！正在跳转……',
        				'url' =>'index',
        				'jumpTime'=>2,
        				'status'=>false
        			];
	        	}else{
	        		$result = [
	        			'message'=>'密码错误！',
	        			'url' =>'login',
	        			'jumpTime'=>2,
	        			'status'=>false
	        		];
	        		
	        	}

	        	return redirect('prompt')->with($result);
        	}
        }else{
        	return view('fronted.Login.login');
        }
	}

	/**
	 * 用户退出
	 */
	public function quit(Request $request)
	{
		$request->session()->forget('user_name');
		$request->session()->forget('user_id');
		return redirect('prompt')->with(['message'=>'退出成功','url' =>'index', 'jumpTime'=>3,'status'=>false]);
	}

	/**
	 * 注册用户
	 * @param register
	 */
	public function register(Request $request)
	{
		if($request->isMethod('POST'))
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
				$purse = new Purse;
				$message = new Message;
				$purse->user_id = $user_id;
				$message->user_id = $user_id;
				$message->message_name = $request['user_name'];
				$result = $purse->save();
				$bloon = $message->save();
				if($result && $bloon){
					return redirect('prompt')->with(['message'=>'注册成功！正在跳转……','url' =>'index', 'jumpTime'=>3,'status'=>false]);
				}else{
					return redirect('prompt')->with(['message'=>'注册失败！请重新注册……','url' =>'register', 'jumpTime'=>3,'status'=>false]);
				}
			}else{
				return redirect('prompt')->with(['message'=>'注册失败！请重新注册……','url' =>'register', 'jumpTime'=>3,'status'=>false]);
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
		$userInfo=user::where("user_name",$post)->first();

		return $userInfo ? 1 : 0;

	}

}
