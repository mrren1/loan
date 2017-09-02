<?php
namespace App\Http\Controllers\backend;
use App\Admin;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\DB;
class AdminController extends BackendController
{
     public function index()
     {
     	 return view('backend/Admin/index');
     }
     //首页展示
     public function welcome()
     {
     	return view('backend/Admin/welcome');
     }
}