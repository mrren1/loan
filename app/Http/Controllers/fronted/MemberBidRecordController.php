<?php

namespace App\Http\Controllers\fronted;

use App\MemberBidRecord;
use App\Http\Controllers\fronted\Controller;

class MemberBidRecordController extends Controller
{
	public function index()
	{
		return view('fronted.member_bid_record');
	}
}