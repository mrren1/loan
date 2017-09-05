<?php

namespace App\Http\Middleware;

use Closure;
// use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\BackendController;


use App\Http\Controllers\backend\AdminController;
//获取控制器名称
use Illuminate\Routing\Route;
use Illuminate\Http\Request;
//入库查找数据
// use App\Http\Models\Admin;
use App\Http\Models\Adminrole;
use App\Http\Models\RoleNode;
use App\Http\Models\Node;
use session;

class AfterUserMiddleware extends BackendController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    

    public function handle( $request, Closure $next)
    {
        $admin_id = $request->session()->get('admin_id');
        // echo $admin;
        // echo "<br>";
        
        // echo $admin_id;
        //查询用户有哪些的角色
        $method_all = $this->jurisdiction($admin_id);
        echo $this->action_only;
        print_r($method_all);
        if(!in_array($this->action_only,$method_all)){
            //权限不够就跳到首页
        return redirect('welcome');
        }
        return $next($request);
    
    }
    //用户的权限
    private function jurisdiction($admin_id){
        $role_all_id = $this->role($admin_id);

        // print_r($role_all_id);
        // 根据角色进行in查找数据
        $node_arr = $this->role_node($role_all_id);
        // print_r(array_unique($node_arr));
        // 搜索出角色对应的权限方法
        $method_all = $this->node($node_arr);
        return $method_all;
    }

    //查询角色有哪些类型的ID,返回一维数组（角色ID）
    private function role($admin_id){
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

        return $role_all_id;
    }

    //根据角色ID进行查询出角色对应的权限ID
    private function role_node($role_all_id){
        $role_node = RoleNode::whereIn('role_id' , $role_all_id)->get()->toArray();
        // print_r($role_node);
        $node_arr = array();
        foreach ($role_node as $key => $val) {
            $node_arr[] = $val['node_id'];
            # code...
        }

        return $node_arr;
    }

    //根据权限ID查找出所有的权限=用户的权限
    private function node($node_arr){
         $node = Node::whereIn('node_id' , $node_arr)->get()->toArray();
        $method_all = array();

        // print_r($node);
        foreach ($node as $key => $val) {
            $method_all[] = $val['node_name'];
        }
        $method_all[] = 'welcome';
        $method_all[] = 'index';
        $this->method_all = $method_all;

        return $method_all;
    }

}
