<?php

namespace App\Http\Controllers;

use App\MemberPay;
use App\Http\Controllers\Controller;

class MemberPayController extends Controller
{
	public function index()
	{
		return view('member_pay');
	}
}