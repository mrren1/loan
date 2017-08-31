<?php

namespace App\Http\Controllers\fronted;

use App\Setloan;
use Illuminate\Http\Request;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\blowloan;

class SetloanController extends Controller
{
	/**
	 * 发布贷款
	 * @param  index
	 */
	public function index(Request $request)
	{
		if($_POST){
			$setloan = new Blowloan;
			$setloan->user_id = $request->session()->get('user_id');
			$setloan->lend_time = $request['lend_time'];
			$setloan->lend_money = $request['lend_money'];
			$setloan->lend_desc = $request['lend_desc'];
			$usance = $request['lend_interest'];
			$lend_interest = substr($usance,0,strpos($usance,'%'));
			$setloan->lend_interest = ($lend_interest/100);
			$info = $setloan->save();
			if($info){
				return redirect('prompt')->with(['message'=>'发布贷款成功','url' =>'index', 'jumpTime'=>3,'status'=>false]);
			}
		}else{
			return view('fronted/setloan');
		}
	}

}