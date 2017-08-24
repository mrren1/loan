<?php

namespace App\Http\Controllers;

use App\MemberIndex;
use App\Http\Controllers\Controller;

class MemberIndexController extends Controller
{
	public function index()
	{
		return view('member_index');
	}
}