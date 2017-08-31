<?php

namespace App\Http\Controllers\fronted;

use App\Market;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\Lend;
use App\Http\Models\User;

class MarketController extends Controller
{
	public function index()
	{
		$lend=Lend::limit(6)->get()->toArray();

		$lendArr=$this->getLendInfo($lend);
		
		return view('fronted.Market.market',array('lendArr'=>$lendArr));
	}

	/**
	 * 获取放款人信息
	 * @access public 
	 */
	public function getLendInfo($lends)
	{
		foreach($lends as $key=>$lend){
			$tmpUserInfo=User::where('user_id',$lend['user_id'])->select('user_name','user_photo')->first()->toArray();
			$lends[$key]['userInfo']=$tmpUserInfo;
		}
		return $lends;
	}
}