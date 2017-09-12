<?php

namespace App\Http\Controllers\fronted;

use App\Market;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\Lend;
use App\Http\Models\User;
use App\Http\Models\Debt;
use Illuminate\Http\Request;
class MarketController extends Controller
{
	//每次放入条数
	private $num = 3;

	public function index(Request $request)
	{
		if(!$request->session()->has('user_id')){
			return redirect('login');
		}
		$user_id=$request->session()->get('user_id');
		//查询数组的长度
		$lend=Lend::where('user_id','!=',$user_id)->select('lend_id')->count();
		//计算层数
		$layer = ceil($lend/$this->num);
		//数组
		for($i=0;$i<$layer;$i++){
			$layerData[$i] = $i+1;
		}
		return view('fronted/Market/market',array('layerData'=>$layerData));
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
			$lendNum=Debt::where('from_id',$lend['lend_id'])->count();
			$lends[$key]['lendNum']=$lendNum;
		}
		return $lends;
	}

	/**
	 * @access public
	 * @param  getMarketList();
	 * @return json_encode(array);
	 */
	public function getMarketList(Request $request)
	{
		$user_id=$request->session()->get('user_id');
		//获取当前层数
		$number = $request['data_num'];
		$start = $this->num*($number-1);
		$lend=Lend::where('user_id','!=',$user_id)->offset($start)->limit($this->num)->get()->toArray();
		$lendArr=$this->getLendInfo($lend);
		if($lendArr){
			return json_encode($lendArr);
		}else{
			return 0;
		}
	}
	
}