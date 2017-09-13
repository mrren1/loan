<?php

namespace App\Http\Controllers\fronted;

use App\MemberTuan;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Http\Models\Lend;

class MemberTuanController extends Controller
{
	public function index(Request $request)
	{
		$user_id=$request->session()->get('user_id');
		if(empty($user_id)){
			return redirect('prompt')->with(['message'=>'没有登录，请先登录','url' =>'login', 'jumpTime'=>3,'status'=>false]);
		}
		$user=User::where(['user_id'=>$user_id])->first()->toArray();
		$lend=Lend::where(['user_id'=>$user_id])->paginate(4);
		return view('fronted.MemberTuan.member_tuan',['lend'=>$lend,'user'=>$user]);
	}
}