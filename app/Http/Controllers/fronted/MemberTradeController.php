<?php

namespace App\Http\Controllers\fronted;

use App\MemberTrade;
use App\Http\Controllers\fronted\Controller;

class MemberTradeController extends Controller
{
	public function index()
	{
		return view('fronted.member_trade');
	}
}