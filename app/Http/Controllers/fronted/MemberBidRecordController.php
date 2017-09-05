<?php

namespace App\Http\Controllers\fronted;

use App\MemberBidRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\Debt;
use App\Http\Models\User;
use App\Http\Models\Lend;

class MemberBidRecordController extends Controller
{
	public function index(Request $request)
	{
		$user_id=$request->session()->get('user_id');
		$month=date('n');
		$day=date('Y-m-d');
		$mon=$request->get('mon');
		$user=User::where(['user_id'=>$user_id])->first()->toArray();
		$debt=Debt::where(['user_id'=>$user_id])->paginate(4);
		$result=Debt::where(['user_id'=>$user_id])->get();
		$month_sum=0;
		$day_sum=0;
		$data=array();
		foreach($result as $k => $v){
			if($month==date('m',strtotime($v->debt_stime))){
				$month_sum+=$v->debt_money;
			}
			if($day==date('Y-m-d',strtotime($v->debt_stime))){
				$day_sum+=$v->debt_money;
			}
			$res1[]=Lend::select('user_id')->where('lend_id','=',$v->from_id)->first();
			$arr1[]=User::select('user_name')->where('user_id','=',$res1[$k]->user_id)->first();
			$v->from_name=$arr1[$k]->user_name;
			$v->user_name=$user['user_name'];
			if($mon==date('m',strtotime($v['debt_stime']))){
				$data[]=$v;
			}		
		}
		foreach($debt as $k => $v)
		{	
			$res[]=Lend::select('user_id')->where('lend_id','=',$v->from_id)->first();
			$arr[]=User::select('user_name')->where('user_id','=',$res[$k]->user_id)->first();
			$v->from_name=$arr[$k]->user_name;
			$v->user_name=$user['user_name'];
		}
		$count = Debt::where(['user_id'=>$user_id])->count();
		if($request->ajax()){
			return $data;
		}
		return view('fronted.MemberBidRecord.member_bid_record',['debt'=>$debt,'user'=>$user,'month_sum'=>$month_sum,'day_sum'=>$day_sum,'count'=>$count]);
	}
}