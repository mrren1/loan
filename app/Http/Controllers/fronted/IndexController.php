<?php

namespace App\Http\Controllers\fronted;
use App\Index;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Demo;
class IndexController extends Controller
{
	public function index()
	{
		return view('fronted/Index/index');
	}
}
