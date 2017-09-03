<?php

namespace App\Http\Controllers\fronted;
use App\Index;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Demo;
use App\Http\Models\Purse;
use Illuminate\Http\Request;
use App\Http\Models\Advert;
use App\Http\Models\Lend;
use App\Http\Models\User;
//use App\Http\Models\Debt;
class IndexController extends Controller
{
	public function index(Request $request)
	{
		$user_id=$request->session()->get('user_id');
		$purseInfo=Purse::where('user_id',$user_id)->first();
		if($purseInfo!=null){
			$purseInfo=$purseInfo->toArray();
		}
		$adArr = Advert::orderBy('lend_money','desc')->limit(3)->select('lend_id')->get()->toArray();
		$adInfoArr=$this->getAdInfo($adArr);
		$adInfoArr=$this->getLendInfo($adInfoArr);
		
		return view('fronted.Index.index',array('purseInfo'=>$purseInfo,'adArr'=>$adInfoArr));
	}

	/**
	 * 获取广告信息
	 * @access public 
	 * @param  lend_id
	 */
	public function getAdInfo($adArr)
	{
		foreach($adArr as $key=>$val){
			$adInfo=lend::where('lend_id',$val)->first()->toArray();
			$adArr[$key]=$adInfo;
		}
		return $adArr;
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
			//$lendNum=Debt::where('from_id',$lend['lend_id'])->count();
			//$lends[$key]['lendNum']=$lendNum;
		}
		return $lends;
	}

}
