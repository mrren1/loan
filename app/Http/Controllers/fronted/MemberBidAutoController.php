<?php

namespace App\Http\Controllers\fronted;

use App\MemberBidAuto;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\Large;
use App\Http\Models\User;
use App\Http\Models\Platform;
use App\Http\Models\Purse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberBidAutoController extends Controller
{
	public function index(Request $request)
	{
		//获取挡墙登录id
		$user_id=$request->session()->get('user_id');
		$user=User::where(['user_id'=>$user_id])->first();
		//print_r($user);die;
		//查询信息
		$arr=Large::where(['user_id'=>$user_id])->paginate(6);
		foreach($arr as $k => $v){
			$arr[$k]->user_name=$user->user_name;
		}
		//print_r($arr);die;
		return view('fronted.MemberBidAuto.member_bid_auto',['arr'=>$arr]);
	}


	/**
	 * 用户确认大额贷款
	 * @access public 
	 * @param  largin_id
	 * @return 0 or 1
	 */
	public function sureLarge(Request $request)
	{
		$large_id=$request['large_id'];
		$largeArr=Large::where('large_id',$large_id)->first()->toArray();
		$user_id=$largeArr['user_id'];
		$large_money=$largeArr['large_money'];
		$Platform=Platform::where('platform_id',1)->first();
		$purse=Purse::where('user_id',$user_id)->first();
		//var_dump($Platform);die;
		//开启事务
		DB::beginTransaction();
		try {
			$b1=Platform::where('platform_id',1)->update(['used'=>$Platform->used+$large_money,'balance'=>$Platform->balance-$large_money]);
			$b2=Purse::where('user_id',$user_id)->update(['purse_sum'=>$purse->purse_sum+$large_money,'purse_balance'=>$purse->purse_balance+$large_money]);
			$b3=Large::where('large_id',$large_id)->update(['status'=>2]);
			if($b1&&$b2&&$b3){
				DB::commit();
				return 1;
			}
		} catch (Exception $e) {
			DB::rollback();
			return 0;
		}
	}


}