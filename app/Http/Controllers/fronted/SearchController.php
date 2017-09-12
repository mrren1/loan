<?php

namespace App\Http\Controllers\fronted;

use App\Search;
use App\Http\Controllers\fronted\Controller;
use App\Http\Models\Lend;

class SearchController extends Controller
{
	//通过状态
	private $pass_status = 1;

	/**
	 * 展示数据
	 * @access public
	 * @param index();
	 * @return array();
	 */
	public function index()
	{
		//查询贷款数据
		$setloan = Lend::where('lend_status',$this->pass_status)->get()->toArray();
		//var_dump($setloan);die;
		return view('fronted.Search.search');
	}

}