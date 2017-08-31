<?php

namespace App\Http\Controllers\fronted;

use App\About;
use App\Http\Controllers\fronted\Controller;

class AboutController extends Controller
{
	public function index()
	{
		return view('fronted.about');
	}
}