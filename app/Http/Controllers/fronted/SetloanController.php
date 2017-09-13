<?php

namespace App\Http\Controllers\fronted;

use App\Setloan;
use Illuminate\Http\Request;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\blowloan;
use App\Http\Models\Platform;
// use Illuminate\Support\Facades\DB;

class SetloanController extends Controller
{
	/**
	 * 发布贷款
	 * @param  index
	 */
	public function index(Request $request)
	{
		if($request->isMethod('POST')){
			//添加贷款
			$setloan = new Blowloan;
			//判断是否合法
			$setloan->user_id = $request->session()->get('user_id');
			$setloan->lend_time = $request['lend_time'];
			$setloan->lend_money = $request['lend_money'];
			$setloan->lend_desc = $request['lend_desc'];
			$setloan->lend_lack = $request['lend_lack'];
			$lend_interest = ($request['lend_interest']/100);
			$setloan->lend_interest = $lend_interest;
			$setloan->lend_type = $request['lend_type'];
			$setloan->lend_person = $request['lend_person'];
			$setloan->lend_phone = $request['lend_phone'];
			$info = $setloan->save();	
			if($info){
				return redirect('prompt')->with(['message'=>'发布贷款成功,请耐心等待审核......','url' =>'member_tuan', 'jumpTime'=>3,'status'=>false]);
			}
		}else{
			return view('fronted.Setloan.setloan');
		}
	}

}