<?php

namespace App\Http\Controllers;

use App\Index;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Demo;
class IndexController extends Controller
{
	public function index()
	{
		return view('index');
	}
}
