<?php

namespace App\Http\Controllers\backend;
use App\Index;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Demo;
class UserController extends Controller//后台用户中心
{
	public function index()//个人主页
	{
		return view('backend/User/user');
	}
	public function userinfo()//个人资料
	{
		return view('backend/User/userinfo');
	}
	public function user_uaac()//认证管理
	{
		return view('backend/User/user_uaac');
	}
	public function user_pwd()//密码设置
	{
		return view('backend/User/user_pwd');
	}
	public function user_ra()//推荐有奖
	{
		return view('backend/User/user_ra');
	}
 	
	public function user_mr()//资金记录
	{
		return view('backend/User/user_mr');
	}

 	public function user_pay_rank()//充值记录
	{
		return view('backend/User/user_pay_rank');
	}

 	public function user_wr()//提现记录
	{
		return view('backend/User/user_wr');
	}
 	public function user_tph()//三方托管
	{
		return view('backend/User/user_tph');
	}
	public function user_mi()//我的投资
	{
		return view('backend/User/user_mi');
	}
	public function user_crt()//债权转让
	{
		return view('backend/User/user_crt');
	}
	public function user_ab()//自动投标
	{
		return view('backend/User/user_ab');
	}
	public function user_fs()//理财统计
	{
		return view('backend/User/user_fs');
	}
 	public function user_my_loan()//我的贷款
	{
		return view('backend/User/user_my_loan');
	}
 	public function user_trtl()//偿还贷款
	{
		return view('backend/User/user_trtl');
	}
 	public function user_ls()//贷款统计
	{
		return view('backend/User/user_ls');
	}
 }
