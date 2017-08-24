<?php

namespace App\Http\Controllers;

use App\Forget;
use App\Http\Controllers\Controller;

class ForgetController extends Controller
{
	public function index()
	{
		return view('forget');
	}
}