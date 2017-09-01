<?php

namespace App\Http\Controllers\fronted;
use App\Index;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Demo;
use App\Http\Models\Purse;
use Illuminate\Http\Request;
use App\Http\Models\Advert;
class IndexController extends Controller
{
	public function index(Request $request)
	{
		$user_id=$request->session()->get('user_id');
		$purseInfo=Purse::where('user_id',$user_id)->first();
		if($purseInfo!=null){
			$purseInfo=$purseInfo->toArray();
		}
		//$ad_arr = DB::select('select lend_money from ad order by lend_money desc limit 3');
		$ad_arr = Advert::orderBy('lend_money','desc')->limit(3)->get()->toArray();
		//echo "<pre>";
		 //dd($ad_arr);exit;
		return view('fronted.Index.index',array('purseInfo'=>$purseInfo,'ad_arr'=>$ad_arr));
	}
}
