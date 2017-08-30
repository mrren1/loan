<?php

namespace App\Http\Controllers\fronted;

use App\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\Debt;

class OfferController extends Controller
{
	public function index(Request $request)
	{
		if($_POST){
			$debt = new Debt;
			$debt->user_id = $request->session()->get('user_id');
			$debt->debt_money = $request['debt_money'];
			$debt->debt_btime = $request['debt_btime'];
			$debt->debt_stime = $request['debt_stime'];
			$debt->from_id = 1;
			$info = $debt->save();
			if($info){
				return redirect()->action('fronted\IndexController@index');
			}
		}else{
			return view('fronted/offer');
		}
	}
}