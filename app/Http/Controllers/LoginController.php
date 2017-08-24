<?php

namespace App\Http\Controllers;

use App\Login;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
	public function index()
	{
		return view('login');
	}

	public function regist()
	{
		return view('reg');
	}
}
