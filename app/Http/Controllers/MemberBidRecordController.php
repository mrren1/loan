<?php

namespace App\Http\Controllers;

use App\MemberBidRecord;
use App\Http\Controllers\Controller;

class MemberBidRecordController extends Controller
{
	public function index()
	{
		return view('member_bid_record');
	}
}