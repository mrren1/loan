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
	//大额贷款年利率
	private $interest=0.2;

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
		$user_id = $request['user_id'];
		$user_name = User::where('user_id',$user_id)->pluck('user_name')->first();

		//获取个人信息
		$largeInfo = Large::where('large_id',$large_id)->first()->toArray();
		$begin_time=$largeInfo['begin_time'];
		$cha = ceil((time()-$begin_time)/3600/24);

		$tmpMoney = $largeInfo['large_limit'];
		$endMoney = round($tmpMoney*(1+$cha/360*$this->interest),2);

		//获取大额贷款用户ID
		$user_id = $largeInfo['user_id'];
		//获取个人钱包表
		$purseInfo = Purse::where('user_id',$user_id)->first()->toArray();
		if($endMoney>$purseInfo['purse_balance']){
			//余额不足不能还款
			return 0;
		}
		$Platform = Platform::where('platform_id',1)->first();
		DB::beginTransaction();
		try {
			$b1 = Platform::where('platform_id',1)->update(array('money'=>$Platform->money+$endMoney,'balance'=>$Platform->balance+$endMoney));
			$b2 = Purse::where('user_id',$user_id)->update(array('purse_used'=>$purseInfo['purse_used']+$endMoney,'purse_balance'=>$purseInfo['purse_balance']-$endMoney));
			$b3 = Large::where('large_id',$large_id)->update(array('status'=>3));
			$purselog = $this->insertLog('purselog','-'.$endMoney.'元','大额贷款还款成功，转账平台-'.$endMoney.'元',$user_id);
			$formlog = $this->insertLog('platformlog','+'.$endMoney.'元',$user_name.'大额贷款成功还款，收到转账+'.$endMoney.'元',$user_id);
			if($b1&&$b2&&$b3&&$purselog&&$formlog){
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
		$user_id = $request['user_id'];
		$user_name = User::where('user_id',$user_id)->pluck('user_name')->first();
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
			$formlog = $this->insertLog('platformlog','-'.$large_money.'元',$user_name.'大额贷款审核成功，平台转账-'.$large_money.'元',$user_id);
			$purselog = $this->insertLog('purselog','+'.$large_money.'元','大额贷款申请成功，收到平台转账+'.$large_money.'元',$user_id);
			if($b1&&$b2&&$b3&&$formlog&&$purselog){
				DB::commit();
				return 1;
			}
		} catch (Exception $e) {
			DB::rollback();
			return 0;
		}
	}


}