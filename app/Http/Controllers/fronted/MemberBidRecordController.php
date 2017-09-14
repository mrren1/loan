<?php

namespace App\Http\Controllers\fronted;

use App\MemberBidRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\fronted\Controller;
use Carbon\Carbon;
use App\Http\Models\Debt;
use App\Http\Models\User;
use App\Http\Models\Lend;
use App\Http\Models\Purse;
use App\Http\Models\Platform;
use Illuminate\Support\Facades\DB;

class MemberBidRecordController extends Controller
{
	//还款状态
	private $status = 1;
	//最低利息
	private $usance = 0.2;
	//平台最低利息
	private $form_usance = 0.01;

	public function index(Request $request)
	{
		//echo die;
		if(isset($request['new_id'])){
			DB::table('news')->where('new_id',$request['new_id'])->update(['is_read'=>1]);
		}
		$user_id=$request->session()->get('user_id');
		if($request->has($user_id)){
			return redirect('prompt')->with(['message'=>'未登录，请先登录','url' =>'login', 'jumpTime'=>2,'status'=>false]);
		}
		//获取当前时间
		$now = Carbon::now();
		//取出当前月份
		$month=$now->month;
		//获取年-月-日
		$day=$now->toDateString(); 
		$mon=$request->get('mon');
		$user=User::where(['user_id'=>$user_id])->first()->toArray();
		$debt=Debt::where(['user_id'=>$user_id])->paginate(4);
		$result=Debt::where(['user_id'=>$user_id])->get();
		$month_sum=0;
		$day_sum=0;
		$data=array();
		foreach($result as $k => $v){
			//创建指定时间
			$date=Carbon::createFromFormat('Y-m-d H:i:s', $v->debt_stime);
			//$date->month:获取指定$date的中的月份
			if($month==$date->month){
				$month_sum+=$v->debt_money;
			}
			//$date->toDateString():获取$date中的年-月-日
			if($day==$date->toDateString()){
				$day_sum+=$v->debt_money;
			}
			if($mon==$date->month){
				$data[]=$v;
			}	
			$v->from_name=$this->getName($v->from_id);
			$v->user_name=$user['user_name'];	
		}
		foreach($debt as $k => $v)
		{	
			$v->from_name=$this->getName($v->from_id);
			$v->user_name=$user['user_name'];
		}
		$count = Debt::where(['user_id'=>$user_id])->count();
		if($request->ajax()){
			return $data;
		}
		return view('fronted.MemberBidRecord.member_bid_record',[
			'debt'=>$debt,
			'user'=>$user,
			'month_sum'=>$month_sum,
			'day_sum'=>$day_sum,
			'count'=>$count
		]);
	}
	/**
	 * 获取借款人姓名
	 */
	public function getName($from_id)
	{
		$uid=Lend::where('lend_id','=',$from_id)->value('user_id');
		$arr=User::select('user_name')->where('user_id','=',$uid)->first();
		return $arr->user_name;
	}

	/**
	 * @access public
	 * @param  repayment()
	 * @return true or false;
	 * 还款
	 */
	public function repayment(Request $request)
	{
		//获取借款id
		$debt_id = $request['debt_id'];
		//查询借款数据
		$debtData = debt::select('user_id','debt_money','debt_btime','debt_stime','from_id')->where('debt_id',$debt_id)->first()->toArray();
		//查询贷款数据
		$lendData = lend::select('user_id','lend_interest')->where('lend_id',$debtData['from_id'])->first()->toArray();
		//判断还款时间是否超出限制时间
		if($debtData['debt_stime'] > date('Y-m-d H:i:s')){
			$strtotime = time()-strtotime($debtData['debt_btime']);
			//借款时间
			$day = floor($strtotime/86400);
			//借款利息
			$interest = round($day/365*$lendData['lend_interest']*$debtData['debt_money'],2); 
			if($interest == 0){
				$interest = $this->usance;
			}
			//还款总金额
			$sum_money = $debtData['debt_money']+$interest;
			//平台金额
			$form_money = round($interest/20,2);
		}else{
			$strtotime = strtotime($debtData['debt_stime'])-strtotime($debtData['debt_btime']);
			$overrun = time()-strtotime($debtData['debt_stime']);
			//借款时间
			$day = floor($strtotime/86400);
			//超出时间
			$overday = ceil($overrun/86400);
			//借款利息
			$interest = round($day/365*$lendData['lend_interest']*$debtData['debt_money'],2); 
			if($interest == 0){
				$interest = $this->usance;
			}
			//超出金额
			$over_money = round($overday/365*($lendData['lend_interest']*2)*$debtData['debt_money'],2);
			//还款总金额
			$sum_money = $debtData['debt_money']+$interest+$over_money;
			//平台金额
			$form_money = round(($interest+$over_money)/20);
		}
		if($form_money == 0){
			$form_money = $this->form_usance;
		}
		//借款用户id
		$debt_user_id = $debtData['user_id'];
		$debt_user_name = User::where('user_id',$debt_user_id)->pluck('user_name')->first();
		//贷款用户id
		$setloan_user_id = $lendData['user_id'];
		$setloan_user_name = User::where('user_id',$setloan_user_id)->pluck('user_name')->first();
		//查询借款人钱包数据
		$debtpurseData = purse::where('user_id',$debt_user_id)->first()->toArray();
		//查询贷款人钱包数据
		$setloanpurseData = purse::where('user_id',$setloan_user_id)->first()->toArray();
		//查询平台表数据
		$formData = platform::first()->toArray();
		//判断金额
		if($debtpurseData['purse_sum'] < $form_money){
			return 2;die;
		}
		$set_money = $sum_money+$form_money;
		//借款人总金额
		$purse_sum = $debtpurseData['purse_sum']-$set_money;
		//借款人使用金额
		$purse_used = $debtpurseData['purse_used']+$set_money;
		//借款人余额
		$purse_balance = $debtpurseData['purse_balance']-$set_money;
		//return $purse_sum.'|'.$purse_used.'|'.$purse_balance;die;
		//贷款人总金额
	    $set_sum = $setloanpurseData['purse_sum']+$sum_money;
	    //贷款人余额
		$set_balance = $setloanpurseData['purse_balance']+$sum_money;
		//return $set_sum.'|'.$set_balance;die;
		//平台总金额
	    $money = $formData['money']+$form_money;
	    //平台余额
	    $balance = $formData['balance']+$form_money;
		//开启事务
		DB::beginTransaction();
		try {  
			//修改借款人钱包数据
	       	$offer_bloon = purse::where('user_id',$debt_user_id)->update(['purse_sum'=>$purse_sum,'purse_used'=>$purse_used,'purse_balance'=>$purse_balance]);
	       	//修改贷款人钱包数据
	       	$setloan_bloon = purse::where('user_id',$setloan_user_id)->update(['purse_sum'=>$set_sum,'purse_balance'=>$set_balance]);
	       	//修改平台数据
	       	$form_bloon = platform::where('platform_id',$formData['platform_id'])->update(['money'=>$money,'balance'=>$balance]);
	       	//修改状态
	       	$debt_result = debt::where('debt_id',$debt_id)->update(['debt_addition'=>$this->status]);
	       	$offerpurselog = $this->insertLog('purselog','-'.$set_money.'元','还款成功，转账给'.$setloan_user_name.'总款+利息：'.$sum_money.'元,转账给平台，利息：'.$form_money.'元',$debt_user_id);
	       	$setloanpurselog = $this->insertLog('purselog','+'.$sum_money.'元','收到'.$debt_user_name.'还款，总款+利息：'.$sum_money.'元',$setloan_user_id);
	       	$formlog = $this->insertLog('platformlog','+'.$form_money.'元','收到'.$debt_user_name.'还款利息：'.$form_money.'元');
	       	//判断是否成功提交
	        if($offer_bloon && $setloan_bloon && $form_bloon && $debt_result && $offerpurselog && $setloanpurselog && $formlog){  
	            DB::commit();  
	            return 1; 
	        }  
	    } catch (\Exception $e) {  
	        DB::rollBack();  
	        return 0;
	    }  
	}
}