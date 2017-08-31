<?php

namespace App\Http\Controllers\fronted;

use App\MemberBidAuto;
use App\Http\Controllers\fronted\Controller;

class MemberBidAutoController extends Controller
{
	public function index()
	{
		return view('fronted.member_bid_auto');
	}
}