<?php
namespace App\Http\Controllers\backend;
use App\Admin;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Models\User;
class AdminController extends Controller
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