<?php

namespace App\Http\Controllers\fronted;

use App\MemberInvite;
use App\Http\Controllers\fronted\Controller;

class MemberInviteController extends Controller
{
	public function index()
	{
		return view('fronted.member_invite');
	}
}