<?php

namespace App\Http\Controllers\backend;

use App\Rbac;
use App\Http\Controllers\fronted\Controller;

class RbacController extends Controller
{
	/**
	 * @access public
	 * @param 添加角色
	 * @return [type] [description]
	 */
     public function role()
     {
     	return view('backend.Rbac.role');
     }

     /**
      * @access public
      * @param  角色列表
      * @return [type] [description]
      */
     public function roleList()
     {
     	return view('backend.Rbac.rolelist');
     }

     /**
      * @access public
      * @param  分配角色
      * @return [type] [description]
      */
     public function power()
     {
     	return view('backend.Rbac.power');
     }

     /**
      * @access public
      * @param  角色列表
      * @return [type] [description]
      */
     public function powerList()
     {
     	return view('backend.Rbac.powerlist');
     }
}