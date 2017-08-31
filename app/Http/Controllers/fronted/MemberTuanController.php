<?php

namespace App\Http\Controllers\fronted;

use App\MemberTuan;
use App\Http\Controllers\fronted\Controller;

class MemberTuanController extends Controller
{
	public function index()
	{
		return view('fronted.member_tuan');
	}
}