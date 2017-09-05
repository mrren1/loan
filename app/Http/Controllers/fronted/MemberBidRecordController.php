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
		if(empty($user_id)){
			return redirect('prompt')->with(['message'=>'没有登录，请先登录','url' =>'login', 'jumpTime'=>3,'status'=>false]);
		}
		$user=User::where(['user_id'=>$user_id])->first()->toArray();
		$debt=Debt::where(['user_id'=>$user_id])->paginate(4);
		foreach($debt as $k => $v)
		{
			$res[]=Lend::select('user_id')->where('lend_id','=',$v->from_id)->first();
			$arr[]=User::select('user_name')->where('user_id','=',$res[$k]->user_id)->first();
			$v->from_name=$arr[$k]->user_name;
		}
		//print_r($debt);die;
		return view('fronted.MemberBidRecord.member_bid_record',['debt'=>$debt,'user'=>$user]);
	}
}