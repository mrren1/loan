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
	 * 用户登陆
	 * @param index
	 */
	public function index()
	{

		return view('fronted.Login.login');
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
	           	exit;
	        }

	        $this->validate($request, [
		        'user_name' => 'required|max:255',
		        'user_pwd' => 'required|min:6',
		    ]);

			$user = new User;
			$user->user_name = $request['user_name'];
			$user->user_pwd = encrypt($request['user_pwd']);
			$user->user_photo = 'kdsfdsjkfdsjf';
			$user->last_time = time();
			$info = $user->save();
			if($info){
				$request->session()->put('user_name',$user->user_name);
				return redirect()->action('fronted\IndexController@index');
			}
	    }else{
	    	return view('fronted.Login.reg');
	    }	
	}


	public function log(Request $request)
	{
       
		$model =new Log;
    
        $data['user_name']= $_POST['username'];
	    $data['user_pwd'] = $_POST['pwd'];
        $info = $model->login($data);
        if($info==2)
        {
             echo "<script>alert('密码错误');location.href='login'</script>";
        }
        elseif($info==3) 
        {
             echo "<script>alert('用户名错误');location.href='login'</script>";
        }
        else
        {
           
        	$request->session()->put('user_name',$info);
            // $a= session()->get('user_name');

         	return redirect()->action('fronted\IndexController@index');     
        }
        
	}
}
