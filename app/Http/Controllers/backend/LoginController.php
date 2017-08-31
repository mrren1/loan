<?php
namespace App\Http\Controllers\backend;
use App\Login;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
     public function index()
     {
     	 return view('backend/Login/login');
     }
}