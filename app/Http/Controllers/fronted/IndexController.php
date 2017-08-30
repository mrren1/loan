<?php

namespace App\Http\Controllers\fronted;
use App\Index;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Demo;
use Illuminate\Http\Request;
class IndexController extends Controller
{
	public function index(Request $request)
	{
		// $user_id=$request->session()->get('user_id');
		// echo $user_id;
		return view('fronted/Index/index');
	}
}
