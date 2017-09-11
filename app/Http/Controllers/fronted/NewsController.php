<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{
	public function show()
	{
		$newObj=DB::table('news')->simplePaginate(10);;

		return view('fronted/News/show',['news'=>$newObj]);
	}
}