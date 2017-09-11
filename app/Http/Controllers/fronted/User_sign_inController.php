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
use App\Http\Models\Integral;
use App\Http\Models\User;
//use App\Http\Models\Debt;
class User_sign_inController extends Controller
{
	/*
	用户签到
	 */
	public function User_sign_in(Request $request )
	{
		$integral = new Integral;
		$qiandao_data =  Integral::where('uid',$request->session()->get('user_id'))->select()->get();//签到数据
		$qiandao_data_list = [];
			if ( count( $qiandao_data ) != 0 ) {
				$qiandao_data_list['count'] = count( $qiandao_data );//总签到天数
				$qiandao_data_list['continuous'] = $qiandao_data[($qiandao_data_list['count']-1)]['continuous'];//连续签到天数
				$qiandao_data_list['money'] = 0;//累计积分
				$qiandao_day = '';
				
				for ($i=0; $i < $qiandao_data_list['count'] ; $i++) { 
					$qiandao_data_list['money'] += $qiandao_data[$i]['integral'];
					$qiandao_day .= ($qiandao_data[$i]['nowday']-1).","; 
				$qiandao_data_list['qiandao_day'] = substr( $qiandao_day, 0, -1 );
				}
			}else{
				$qiandao_data_list['count'] = 0;
				$qiandao_data_list['continuous'] = 0;
				$qiandao_data_list['money'] = 0;//累计积分	
				$qiandao_data_list['qiandao_day'] = null;
				$qiandao_data = [];

			}
		return view('fronted.User_sign_in.User_sign_in',array( 'qiandao_data'=>$qiandao_data,"qiandao_data_list"=>$qiandao_data_list ));

	}
	public function fronted_integral(Request $request)
	{
		$integral = new Integral;
		if($request->isMethod('POST'))
		{
		$arr=$request->all();
		$ucheck = Integral::where('uid',$request->session()->get('user_id'))->select()->first();
			if ( date("Y/m/d",$ucheck['sign_in_time']) != date( "Y/m/d",time() ) ) {
			$integral->uid          = $uid = $request->session()->get('user_id');
			$integral->uname        = $arr['uname'];
			$integral->integral     = $arr['integral'];
			$integral->nowday = $arr['nowday'];
			$integral->sign_in_time = time();
			$integral->continuous = $arr['Continuous_sign_in_arr_length'];
			$result = $integral->save();
			return json_encode( $result );
			}else{
				return 3;//今天已签到
			}
		}else{
			return 2;//非POST接值
		}

	}


}
