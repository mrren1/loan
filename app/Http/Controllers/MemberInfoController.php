<?php

namespace App\Http\Controllers;

use App\MemberInfo;
use App\Http\Controllers\Controller;

class MemberInfoController extends Controller
{
	public function index()
	{
		return view('member_info');
	}
}