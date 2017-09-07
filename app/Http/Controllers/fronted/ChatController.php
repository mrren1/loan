<?php

namespace App\Http\Controllers\fronted;

use App\Chat;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChatController extends Controller
{
	public function index(Request $request)
	{
		//获取当前用户名
		$user_name = $request->session()->get('user_name');
		return view('fronted.chat.chat_room',['user_name'=>$user_name]);
	}
}