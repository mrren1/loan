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
class userSignInController extends Controller
{
	/*
	用户签到
	 */
	public function userSignIn(Request $request )
	{
		$integral = new Integral;
		$signInData = Integral::where('uid',$request->session()->get('user_id'))->orderBy("sign_in_time","desc")->limit(8)->select()->get();//签到数据
		$signInList               = [] ;//存储用户 1. 连续签到天数 ，2. 总签到天数 ，3. 签到累计金额 。
		$signInList["signIned"]   = 0  ;//判断用户今天是否已经签到 1 签到 0 未签到
		$signInList['count']      = 0  ;//2. 总签到天数
		$signInList['money']      = 0  ;//3. 签到累计金额	
		$signInList['signInDay']  = null ;//用户本月已签到的具体天数
		$signInList['continuous'] = 0  ;//1. 连续签到天数 
		if( count( $signInData ) != 0 ){

			$signInDay                = '' ;
			$signInList['money']      = 0 ; //累计积分
			$signInList['count']      = count($signInData) ; //总签到天数
			$signInList['continuous'] = $signInData[ 0 ]['continuous'] ;//连续签到天数
			
			if ( date( "Y/m/d" , $signInData[ 0 ]['sign_in_time'] ) == date( "Y/m/d",time() ) ) 
			{$signInList["signIned"] = 1;}
			
			for ($i=0; $i < $signInList['count'] ; $i++) { 
					$signInDay 			    .= ($signInData[$i]['nowday']-1)."," ; 
					$signInList['money']    += $signInData[$i]['integral'];
					$signInList['signInDay'] = substr( $signInDay, 0, -1 );
			}
		//$signInData 存储用户签到表信息
		}else{      $signInData              = [] ; }
		return view('fronted.userSignIn.userSignIn',array( 'signInData'=>$signInData,"signInList"=>$signInList ));

	}
	public function frontedIntegral(Request $request)
	{
		$integral = new Integral;
		if($request->isMethod('POST'))
		{
		$arr=$request->all();
		$ucheck = Integral::where('uid',$request->session()->get('user_id'))->orderBy('sign_in_time','desc')->select()->first();
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
