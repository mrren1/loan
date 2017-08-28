<?php

namespace App\Http\Controllers;

use App\MemberTrade;
use App\Http\Controllers\Controller;

class MemberTradeController extends Controller
{
	public function index()
	{
		return view('member_trade');
	}
}