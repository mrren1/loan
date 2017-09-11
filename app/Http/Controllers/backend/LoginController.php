<?php
namespace App\Http\Controllers\backend;

use App\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\backend\BackendController;
use Validator;
use Illuminate\Support;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin;
use session;

class LoginController extends BackendController
{
     public function index(Request $request)
     {
     	if($request->isMethod('POST')){
            $captcha=['captcha' => 'required|captcha'];
            $validator = Validator::make(Input::all(), $captcha);
            if($validator->fails()){
                $result=[
                    'message'=>'验证码错误！',
                    'url' =>'admin_login', 
                    'jumpTime'=>2,
                    'status'=>false
                ];
                return redirect('prompt')->with($result);   
            }else{
                $adminArr=Admin::where("admin_name",$request['admin_name'])->first();
                if(empty($adminArr)){
                $result = [
                    'message'=>'没有此用户！',
                    'url' =>'admin_login',
                    'jumpTime'=>2,
                    'status'=>false
                ];
                return redirect('prompt')->with($result);  
                }else{
                    $adminArr=$adminArr->toArray();
                    if($request['admin_pwd']==decrypt($adminArr['admin_pwd'])){
                    $admin = new Admin;
                    $admin->where('admin_id',$adminArr['admin_id'])->update(array('log_time'=>time()));
                    $request->session()->put('admin_id',$adminArr['admin_id']);
                    $request->session()->put('admin_name',$adminArr['admin_name']);
                    $result = [
                        'message'=>'登陆成功！',
                        'url' =>'admin_index',
                        'jumpTime'=>2,
                        'tatus'=>false
                    ];
                    return redirect('prompt')->with($result); 
                }else{
                    $result = [
                        'message'=>'密码错误！',
                        'url' =>'admin_login',
                        'jumpTime'=>2,
                    'status'=>false
                    ];
                        return redirect('prompt')->with($result);   
                    }
                }
            }
     		
     	}else{
     		return view('backend/Login/login');
     	}
     	
     }
    public function quit(Request $request)
    {
        $request->session()->forget('admin_name');
        $request->session()->forget('admin_id');
        $result = [
            'message'=>'退出成功',
            'url' =>'admin_index', 
            'jumpTime'=>3,
            'status'=>false
        ];
        return redirect('prompt')->with($result);
    }

}