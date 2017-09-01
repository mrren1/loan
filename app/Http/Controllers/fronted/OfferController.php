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
		$lend_id=$request['id'];
		$lendInfo=Lend::where('lend_id',$lend_id)
		->first();
		if($lendInfo!=''){
			$lendInfo=$lendInfo->toArray();
		}

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
			return view('fronted.Offer.offer',['from_id'=>$lend_id,'userMessage'=>$userInfo,'lendInfo'=>$lendInfo]);
		}
	}
}