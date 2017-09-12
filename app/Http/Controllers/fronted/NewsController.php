<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class NewsController extends Controller
{
	public function show(Request $request)
	{
		$user_id = $request->session()->get('user_id');
		$newObj=DB::table('news')->where('user_id',$user_id)->Paginate(10);

		return view('fronted/News/show',['news'=>$newObj]);
	}
}