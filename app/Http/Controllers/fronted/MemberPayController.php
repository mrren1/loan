<?php

namespace App\Http\Controllers\fronted;

use App\MemberPay;
use App\Http\Controllers\fronted\Controller;

class MemberPayController extends Controller
{
	public function index()
	{
		return view('fronted/member_pay');
	}
}