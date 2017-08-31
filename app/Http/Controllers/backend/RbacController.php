<?php
namespace App\Http\Controllers\backend;
use App\Rbac;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
class RbacController extends Controller
{

     /**
      * 角色列表
      *
      */
     public function admin_role()
     {
     	return view('backend/Rbac/admin_role');
     }
     /**
      * 角色添加
      */
     public function admin_role_add()
     {
     	return view('backend/Rbac/admin_role_add');
     }
     /**
      * 权限管理
      */
     public function admin_permission()
     {
         return view('backend/Rbac/admin_permission');
     }
     /**
      * 权限添加
      */
      public function admin_permission_add()
      {
      	return view('backend/Rbac/admin_permission_add');
      }
     /**
      * 管理员列表
      */
     public function admin_list()
     {
     	return view('backend/Rbac/admin_list');
     }
     /**
      * 管理员添加
      */
      public function admin_add()
     {
     	return view('backend/Rbac/admin_add');
     }
}