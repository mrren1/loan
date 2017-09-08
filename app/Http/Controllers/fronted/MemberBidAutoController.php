<?php

namespace App\Http\Controllers\fronted;

use App\MemberBidAuto;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\Large;
use App\Http\Models\User;
use Illuminate\Http\Request;

class MemberBidAutoController extends Controller
{
	public function index(Request $request)
	{
		//获取挡墙登录id
		$user_id=$request->session()->get('user_id');
		$user=User::where(['user_id'=>$user_id])->first();
		//print_r($user);die;
		//查询信息
		$arr=Large::where(['user_id'=>$user_id])->paginate(2);
		foreach($arr as $k => $v){
			$arr[$k]->user_name=$user->user_name;
		}
		//print_r($arr);die;
		return view('fronted.MemberBidAuto.member_bid_auto',['arr'=>$arr]);
	}
}