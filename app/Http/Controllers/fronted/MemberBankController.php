<?php

namespace App\Http\Controllers\fronted;

use App\MemberBank;
use App\Http\Controllers\fronted\Controller;

class MemberBankController extends Controller
{
	public function index()
	{
		return view('fronted/member_bank');
	}
}