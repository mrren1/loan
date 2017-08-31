<?php
namespace App\Http\Controllers\backend;

use App\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\fronted\Controller;
use Validator;
use Illuminate\Support;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Models\admin;
use session;

class LoginController extends Controller
{
     public function index(Request $request)
     {
     	if($request->isMethod('POST'))
     	{
               $captcha=['captcha' => 'required|captcha'];
               $validator = Validator::make(Input::all(), $captcha);
               if($validator->fails())
               {
                   return redirect('prompt')->with(['message'=>'验证码错误！','url' =>'admin_login', 'jumpTime'=>2,'status'=>false]);
                    
               }
               else
               {
                   $admin_arr=admin::where("admin_name",$request['admin_name'])->first();
                    if(empty($admin_arr))
                    {
                         return redirect('prompt')->with(['message'=>'用户名错误！','url' =>'admin_login', 'jumpTime'=>2,'status'=>false]);
                         
                    }
                    else
                    {
                         $admin_arr=$admin_arr->toArray();
                         if($request['admin_pwd']==decrypt($admin_arr['admin_pwd']))
                         {
                              $admin = new Admin;
                              $admin->where('admin_id',$admin_arr['admin_id'])->update(array('log_time'=>time()));
                              $request->session()->put('admin_id',$admin_arr['admin_id']);
                              
                              return redirect('prompt')->with(['message'=>'登陆成功！正在跳转……','url' =>'admin_index', 'jumpTime'=>2,'status'=>false]);
                    }
                    else{
                         return redirect('prompt')->with(['message'=>'密码错误！','url' =>'admin_login', 'jumpTime'=>2,'status'=>false]);
                              
                         }
                    }
               }
     		
     	}
     	else
     	{
     		return view('backend/Login/login');
     	}
     	
     }

}