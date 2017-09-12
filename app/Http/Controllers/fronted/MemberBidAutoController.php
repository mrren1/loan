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
	/**
	 * [index description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function index(Request $request)
	{
		if(isset($request['new_id'])){
			DB::table('news')->where('new_id',$request['new_id'])->update(['is_read'=>1]);
		}
		//获取当前登录id
		$user_id=$request->session()->get('user_id');
		$user=User::where(['user_id'=>$user_id])->first();
		//查询信息
		$arr=Large::where(['user_id'=>$user_id])->paginate(6);
		foreach($arr as $k => $v){
			$arr[$k]->user_name=$user->user_name;
		}
		return view('fronted.MemberBidAuto.member_bid_auto',['arr'=>$arr]);
	}

	/**
	 * 大额贷款的还款
	 * @access public 
	 * @param  largin_id
	 * @return bloon
	 */
	public function giveMoney(Request $request)
	{
		$large_id = $request['large_id'];
		//获取个人信息
		$largeInfo = Large::where('large_id',$large_id)->first()->toArray();
		//获取大额贷款用户ID
		$user_id = $largeInfo['user_id'];
		//获取个人钱包表
		$purseInfo = Purse::where('user_id',$user_id)->first()->toArray();
		if($largeInfo['large_limit']>$purseInfo['purse_balance']){
			//余额不足不能还款
			return 0;
		}
		$Platform = Platform::where('platform_id',1)->first();
		DB::beginTransaction();
		try {
			$b1 = Platform::where('platform_id',1)->update(array('money'=>$Platform->money+$largeInfo['large_limit'],'balance'=>$Platform->balance+$largeInfo['large_limit']));
			$b2 = Purse::where('user_id',$user_id)->update(array('purse_used'=>$purseInfo['purse_used']+$largeInfo['large_limit'],'purse_balance'=>$purseInfo['purse_balance']+$largeInfo['large_limit']));
			$b3 = Large::where('large_id',$large_id)->update(array('status'=>3));
			if($b1&&$b2&&$b3){
				DB::commit();
				return 1;
			}
		} catch (Exception $e) {
			DB::rollback();
			return 2;
		}
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
		$large_money=$largeArr['large_limit'];
		$Platform=Platform::where('platform_id',1)->first();
		$purse=Purse::where('user_id',$user_id)->first();
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