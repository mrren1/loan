<?php

namespace App\Http\Controllers;

use App\MemberBank;
use App\Http\Controllers\Controller;

class MemberBankController extends Controller
{
	public function index()
	{
		return view('member_bank');
	}
}