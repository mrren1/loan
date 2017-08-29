<?php

namespace App\Http\Controllers;
use App\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Models\log;
use session;
class LoginController extends Controller
{
	public function index()
	{
		return view('login');

	}

	public function regist()
	{
		return view('reg');
	}

	public function log(Request $request)
	{
       
		$model =new Log;
        if($_POST)
        {
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

             	return redirect()->action('IndexController@index');     
            }
        }
        
        
	}
}
