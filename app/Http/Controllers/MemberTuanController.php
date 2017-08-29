<?php

namespace App\Http\Controllers;

use App\MemberTuan;
use App\Http\Controllers\Controller;

class MemberTuanController extends Controller
{
	public function index()
	{
		return view('member_tuan');
	}
}