<?php

namespace App\Http\Controllers;

use App\MemberBidAuto;
use App\Http\Controllers\Controller;

class MemberBidAutoController extends Controller
{
	public function index()
	{
		return view('member_bid_auto');
	}
}