<?php

namespace App\Http\Controllers;

use App\MemberInvite;
use App\Http\Controllers\Controller;

class MemberInviteController extends Controller
{
	public function index()
	{
		return view('member_invite');
	}
}