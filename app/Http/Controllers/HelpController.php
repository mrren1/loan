<?php

namespace App\Http\Controllers;

use App\Help;
use App\Http\Controllers\Controller;

class HelpController extends Controller
{
	public function index()
	{
		return view('help');
	}
}