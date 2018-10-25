<?php

namespace App\Http\Controllers\fronted;

use App\Search;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\Lend;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	//通过状态
	private $pass_status = 1;
	//每页显示条数
	private $num = 2;

	/**
	 * 展示数据
	 * @access public
	 * @param index();
	 * @return array();
	 */
	public function index(Request $request)
	{
		if($request->isMethod('POST')){
			//获取当前页
			$page = isset($request['page'])?$request['page']:1;
			$total = $request['total'];
			//获取条件
			$interest = !empty($request['interest'])?$request['interest']:0.21;
			$money = !empty($request['money'])?$request['money']:0;
			$low_money = !empty($request['low_money'])?$request['low_money']:0;
			if($page == 1){
				$start = 0;
			}else{
				$start = ($page-1)*$this->num;
			}
			//查询贷款数据
			$setloanData = Lend::offset($start)->limit($this->num)->where('lend_status',$this->pass_status)->where('lend_interest','<', $interest)->where('lend_money','>',$money)->where('lend_lack','>',$low_money)->join('user','lend.user_id','=','user.user_id')->get()->toArray();
			if($setloanData){
				$arr = [
					'setloanData' => $setloanData,
					'page' => $page,
					'total' => $total,
				];
				return json_encode($arr);
			}else{
				return 0;
			}
			
		}else{
			//获取当前页
			$page = isset($request['page'])?$request['page']:1;
			//查询总条数
			$count = Lend::where('lend_status',$this->pass_status)->select('lend_id')->count();
			//计算总条数
			$total = ceil($count/$this->num);
			//查询贷款数据
			$setloanData = Lend::offset(0)->limit($this->num)->where('lend_status',$this->pass_status)->join('user','lend.user_id','=','user.user_id')->get()->toArray();
			$arrData = [
				'page' => $page,
				'total' => $total,
			];
			return view('fronted.Search.search',['setloanData'=>$setloanData,'arrData'=>$arrData]);
		}	
	}

	/**
	 * 搜索
	 * @access public
	 * @param search_where();
	 * @return array();
	 */
	public function search_where(Request $request)
	{
		//获取当前页
		$page = isset($request['page'])?$request['page']:1;
		$interest = !empty($request['interest'])?$request['interest']:0.21;
		$money = !empty($request['money'])?$request['money']:0;
		$low_money = !empty($request['low_money'])?$request['low_money']:0;
		//查询总条数
		$count = Lend::where('lend_status',$this->pass_status)->where('lend_interest','<', $interest)->where('lend_money','>',$money)->where('lend_lack','>',$low_money)->count();
		//计算总条数
		$total = ceil($count/$this->num);
		if($count){
			$lendData = Lend::where('lend_status',$this->pass_status)->where('lend_interest','<', $interest)->where('lend_money','>',$money)->where('lend_lack','>',$low_money)->offset(0)->limit($this->num)->join('user','lend.user_id','=','user.user_id')->get()->toArray();
			if($lendData){
				$arr = [
					'lendData' => $lendData,
					'page' => $page,
					'total' => $total,
				];
				return json_encode($arr);
			}else{
				return 1;
			}
		}else{
			return 0;
		}
	}

}