<?php

namespace App\Http\Controllers\fronted;
use App\Index;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Demo;
use App\Http\Models\Purse;
use Illuminate\Http\Request;
class IndexController extends Controller
{
	public function index(Request $request)
	{
		$user_id=$request->session()->get('user_id');
		$purseInfo=Purse::where('user_id',$user_id)->first();
		if($purseInfo!=null){
			$purseInfo=$purseInfo->toArray();
		}
		return view('fronted/Index/index',array('purseInfo'=>$purseInfo));
	}
}
