<?php

namespace App\Http\Controllers;

use App\MemberPay;
use App\Prompt;
use App\Http\Models\Purse;
use App\Http\Models\Put;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class MemberPayController extends Controller
{
	public function index()
	{
		return view('member_pay');
	}
	/**
	 * 提现
	 * 渲染模板
	 */
	public function member_mention()
	{
	  $data=
	  [
		'ICBC'=>'中国工商银行','ABC' =>'中国农业银行','BOC' =>'中国银行','CCB' =>'中国建设银行',
		'BC' =>'交通银行','CB' =>'中信银行','CEB' =>'中国光大银行','HB' =>'华夏银行',
		'CMB'=>'中国民生银行','SDB'=>'深圳发展银行','MB' =>'招商银行','IB' =>'兴业银行',
        'SPDB'=>'上海浦东发展银行','BOB'=>'北京银行','CCMB'=>'城市商业银行','RCC'=>'农村信用合作社',
		'SB' =>'盛京银行','BOT'=>'天津银行','BON'=>'宁波银行','CHB'=>'重庆银行','BONA'=>'南京银行',
		'BOJ'=>'江苏银行','SPB'=>'深圳平安银行','PSBC'=>'中国邮政储蓄银行',
       ];
	   $user_id = 12;
       $put = new Put();
       $purseModel = new Purse();
	   $Purse = $this->objectToArray($purseModel->GetAll($user_id));//钱包
       $arr = $this->objectToArray($put->GetAll($user_id));//个人银行信息
       if(isset($arr))
       {
       	//提现页面
         return view('member_pay/put_our',['arr'=>$arr,'Purse'=>$Purse,'data'=>$data]);
       }else
       {
       	//添加
         return view('member_pay/put_pay',['data'=>$data]);
       } 
	}
    /**
     * 添加个人银行信息
     */
    public function Add_bank(Request $request)
    {
       $user_id=12;
       $put = new Put();
       $input = $request->all();
       if(empty($input['card_name']) || empty($input['put_num']) || empty($input['put_name']))
       {
       	 return redirect('prompt')->with(['message'=>'请完善信息！','url' =>'member_mention', 'jumpTime'=>3,'status'=>false]);
       }
       if(empty(is_numeric($input['put_num'])) || strlen($input['put_num'])<19)
       {
       	 return redirect('prompt')->with(['message'=>'请正确填写银行卡号！','url' =>'member_mention', 'jumpTime'=>3,'status'=>false]);
       }
       //执行信息入库操作
       $put->card_name = $input['card_name'];
       $put->put_num = $input['put_num'];
       $put->put_name = $input['put_name'];
       $put->add_time=time();
       $put->user_id = $user_id;
       $success=$put->save();
       if($success){
         return redirect('prompt')->with(['message'=>'添加成功','url' =>'member_mention', 'jumpTime'=>3,'status'=>false]);
       }else{
         return redirect('prompt')->with(['message'=>'添加失败','url' =>'member_mention', 'jumpTime'=>3,'status'=>false]);
       }
    }
	//先编码成json字符串，再解码成数组
	function objectToArray($object) {
    return json_decode(json_encode($object), true);
   }
}