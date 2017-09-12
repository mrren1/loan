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
	private $num = 5;

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
		}else{
			//查询贷款数据
			$setloanData = Lend::offset(0)->limit($this->num)->where('lend_status',$this->pass_status)->join('user','lend.user_id','=','user.user_id')->get()->toArray();
			// var_dump($setloanData);die;
			return view('fronted.Search.search',['setloanData'=>$setloanData]);
		}	
	}

}