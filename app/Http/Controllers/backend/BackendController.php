<?php

namespace App\Http\Controllers\backend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

//获取控制器名称
use Illuminate\Routing\Route;
use Illuminate\Http\Request;


class BackendController extends BaseController
{
	//方法名和类名
	protected   $action_only;
	protected   $class_only;
    protected   $user_role_all;     //用户角色
    protected   $method_all;        //用户所拥有的权限名
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //获取web.php文件里的路径，进行数据处理
     public function __construct(Route $route ,Request $request){
     		// $all_url = $route->getAction('action');
		 $action = \Route::current()->getActionName();  
    	list($class, $method) = explode('@', $action);  
 		$this->action_only = $method;
 		$this->class_only = $class;
        // echo $method;
     }

}
