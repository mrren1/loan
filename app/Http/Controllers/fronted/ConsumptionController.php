<?php

namespace App\Http\Controllers\fronted;

use App\Consumption;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Purselog;

class ConsumptionController extends Controller
{
	/**
	 * @access public
	 * @param  index();
	 * @return array();
	 * 展示消费记录
	 */
	public function index(Request $request)
	{
		$user_id = $request->session()->get('user_id');
		$purselogData = Purselog::where('user_id',$user_id)->get()->toArray();
		return view('fronted.Consumption.show',['purselogData'=>$purselogData]);
	}

	/**
	 * @access public
	 * @param  delete();
	 * @return array();
	 * 删除消费记录
	 */
	public function delete(Request $request)
	{
		$purselog_id = $request['purselog_id'];
		$bloon = Purselog::where('purselog_id',$purselog_id)->delete();
		return $bloon ? 1 : 0;
	}
}