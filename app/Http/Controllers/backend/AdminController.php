<?php
namespace App\Http\Controllers\backend;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\DB;
use Validator;

use session;
class AdminController extends BackendController
{
    public function index(Request $request)
    {
        $admin_id = $request->session()->get('admin_id');
        $id = DB::select("select * from admin where admin_id='$admin_id'");
        if($id){
            return view('backend/Admin/index');
        }else{
            $result = [
                'message'=>'请登录!',
                'url' =>'admin_login',
                'jumpTime'=>2,
                'status'=>false
            ];
            return redirect('prompt')->with($result);
        }
    }
     //首页展示
    public function welcome()
    {
     	$data = $_SERVER;
     	return view('backend/Admin/welcome',['data'=>$data]);
    }

    

}