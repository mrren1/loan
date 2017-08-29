<?php

namespace App\Http\Controllers\fronted;

use App\MemberIndex;
use App\Http\Controllers\fronted\Controller;

class MemberIndexController extends Controller
{
	public function index()
	{
		return view('fronted/member_index');
	}
}