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

		return view('fronted.Offer.offer',['from_id'=>$lend_id,'userInfo'=>$userInfo,'lendInfo'=>$lendInfo,'lendNum'=>$lendNum]);
		
	}

	/**
	 * 添加贷款申请
	 * @access public 
	 * @param  lend_id,user_id
	 */
	public function adddebt(Request $request)
	{
		//echo $request['lend_id'];die;
		//验证信息
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
		if($request['debt_money']==''){
			return redirect('prompt')->with(['message'=>'请填写金额！','url' =>'debt?lend_id='.$lend_id, 'jumpTime'=>2,'status'=>false]);
		}
		if($request['debt_stime']==''){
			return redirect('prompt')->with(['message'=>'请填写时间！','url' =>'debt?lend_id='.$lend_id, 'jumpTime'=>2,'status'=>false]);
		}
		if($request['debt_desc']==''){
			return redirect('prompt')->with(['message'=>'请填写描述！','url' =>'debt?lend_id='.$lend_id, 'jumpTime'=>2,'status'=>false]);
		}
		if($request['debt_money']>$userInfo['message_limit']){
			return redirect('prompt')->with(['message'=>'您填的金额数量超过自身最大限制！','url' =>'debt?lend_id='.$lend_id, 'jumpTime'=>2,'status'=>false]);
		}
		if($request['debt_money']>($lendInfo['lend_money']-$lendInfo['lend_used'])){
			return redirect('prompt')->with(['message'=>'当前贷款不足！','url' =>'debt?lend_id='.$lend_id, 'jumpTime'=>2,'status'=>false]);

		}
		if($request['debt_money']<$lendInfo['lend_lack']){
			return redirect('prompt')->with(['message'=>'当前贷款太少！！','url' =>'debt?lend_id='.$lend_id, 'jumpTime'=>2,'status'=>false]);

		}

		if(time()>=strtotime($request['debt_stime'])){
			return redirect('prompt')->with(['message'=>'时间选择失败!','url' =>'debt?lend_id='.$lend_id, 'jumpTime'=>2,'status'=>false]);
		}

		$debt=new debt();
		$debt->user_id=$user_id;
		$debt->debt_money=$request['debt_money'];
		$debt->debt_btime=date('Y-m-d H:i:s');
		$debt->debt_stime=$request['debt_stime'];
		$debt->from_id=$request['from_id'];
		$debt->debt_desc=$request['debt_desc'];
		$bloon=$debt->save();
		if($bloon){
			return redirect('prompt')->with(['message'=>'申请成功，请等待审核！','url' =>'market', 'jumpTime'=>2,'status'=>false]);
		}else{
			return redirect('prompt')->with(['message'=>'申请成功，请等待审核！','url' =>'debt?lend_id='.$request['from_id'], 'jumpTime'=>2,'status'=>false]);
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
		$timeNum1=time();
		$timeNum2=strtotime($time2);
		if($timeNum1>=$timeNum2){
			return 0;
		}
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