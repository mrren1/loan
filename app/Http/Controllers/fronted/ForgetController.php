<?php

namespace App\Http\Controllers\fronted;

use App\Forget;
use App\Http\Controllers\fronted\Controller;

class ForgetController extends Controller
{
	public function index()
	{
		return view('fronted/forget');
	}
}