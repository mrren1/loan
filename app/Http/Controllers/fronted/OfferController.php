<?php

namespace App\Http\Controllers\fronted;

use App\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\Debt;
use App\Http\Models\Message;
use App\Http\Models\Lend;

class OfferController extends Controller
{
	public function index(Request $request)
	{
		//获取贷款人额度
		$user_id = $request->session()->get('user_id');
		$userInfo = Message::where('user_id',$user_id)
		->first()
		->toArray();
		//获取借款信息
		$lend_id=$request['lend_id'];
		$lendInfo=Lend::where('lend_id',$lend_id)
		->first();
		if($lendInfo!=''){
			$lendInfo=$lendInfo->toArray();
		}
		$lendNum=Debt::where('from_id',$lend_id)->count();

		if($_POST){
			$debt = new Debt;
			$debt->user_id = $request->session()->get('user_id');
			$debt->debt_money = $request['debt_money'];
			$debt->debt_btime = $request['debt_btime'];
			$debt->debt_stime = $request['debt_stime'];
			$debt->from_id = $request['from_id'];
			$info = $debt->save();
			if($info){
				return redirect()->action('fronted\IndexController@index');
			}
		}else{
			//var_dump($lendInfo);die;
			return view('fronted.Offer.offer',['from_id'=>$lend_id,'userInfo'=>$userInfo,'lendInfo'=>$lendInfo,'lendNum'=>$lendNum]);
		}
	}


	/**
	 * ajax计算利息
	 * @param money,interest
	 */
	public function arithmetic(Request $request)
	{
		$money=$request['money'];
		$time1=$request['time1'];
		$time2=$request['time2'];
		$lend=$request['lend'];
		$timeNum1=strtotime($time1);
		$timeNum2=strtotime($time2);
		$shi=$timeNum2-$timeNum1;
		$dayNum=floor($shi/3500/24);
		$interest=round($money/1*(0.2/365*$dayNum),2);
		$result=array();
		$result['dayNum']=$dayNum;
		$result['interest']=$interest;
		$result['money']=$money;
		return json_encode($result);
	}

}