<?php

namespace App\Http\Controllers\backend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\backend\AdminController;

//获取控制器名称
use Illuminate\Routing\Route;
use Illuminate\Http\Request;

//入库查找数据
// use App\Http\Models\Admin;
use App\Http\Models\Adminrole;
use App\Http\Models\RoleNode;
use App\Http\Models\Node;
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
 		// $admin_id= $request->session()->get('admin_id');
 		//模拟用户Session
 		$admin_id=3;
 		//查询用户有哪些的角色
 		$role_arr=Adminrole::where('admin_id', $admin_id)->get()->toArray();
        if(empty($role_all)){
            $role_all = array();
        }
        //保存用户角色，后续使用
        $this->user_role_all = $role_all;
 		$role_all_id = array();
 		//进行数据处理
 		foreach ($role_arr as $key => $val) {
 			$role_all_id[] = $val['role_id'];
 		}

 		// print_r($role_all_id);
 		// 根据角色进行in查找数据
 		$role_node = RoleNode::whereIn('role_id' , $role_all_id)->get()->toArray();
 		// print_r($role_node);
 		$node_arr = array();
 		foreach ($role_node as $key => $val) {
 			$node_arr[] = $val['node_id'];
 			# code...
 		}
 		// print_r(array_unique($node_arr));
 		// 搜索出角色对应的权限方法
 		$node = Node::whereIn('node_id' , $node_arr)->get()->toArray();
 		$method_all = array();
        // print_r($node);
 		foreach ($node as $key => $val) {
 			$method_all[] = $val['node_name'];
 			
 			# code...
 		}
 		$method_all[] = 'welcome';
        $method_all[] = 'index';
        $this->method_all = $method_all;
 	


     }
}
