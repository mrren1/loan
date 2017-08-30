<?php

namespace App\Http\Controllers\fronted;

use App\MemberIndex;
use App\Http\Models\Purse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\fronted\Controller;

class MemberIndexController extends Controller
{
	public function index()
	{
		//用户id
		$user_id = $request->session()->get('user_id');
		$purseModel = new Purse();
		//获取用户钱包数据
		$Purse = $this->objectToArray($purseModel->GetAll($user_id));
		return view('fronted/member_index',['Purse'=>$Purse]);
	}
	
	//先编码成json字符串，再解码成数组
	function objectToArray($object) {
    return json_decode(json_encode($object), true);
   }
}