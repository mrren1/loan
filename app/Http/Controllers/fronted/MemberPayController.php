<?php

namespace App\Http\Controllers\fronted;

use App\MemberPay;
use App\Prompt;
use App\Http\Models\Purse;
use App\Http\Models\Put;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\fronted\Controller;

class MemberPayController extends Controller
{
	public function index(Request $request)
	{
     $user_id=$user_id=$request->session()->get('user_id');
     $Purse = Purse::where('user_id',$user_id)->first()->toArray();//钱包
		return view('fronted.member_pay',['Purse'=>$Purse]);
	}
    /**
   * 充值
   * 渲染页面
   */
  public function memberCharge(Request $request)
  {
      if($request->isMethod('POST'))
      {
        
      }else
      {
        $user_id=$user_id=$request->session()->get('user_id');
        $Purse = Purse::where('user_id',$user_id)->first()->toArray();//钱包
        return view('fronted.member_pay.member_charge',['Purse'=>$Purse]);
      }   
  }
  /**
   * 充值成功
   */
  public function chargeSuccess()
  {
     return view('fronted.member_pay.charge_success');
  }
	/**
	 * 提现
	 * 渲染模板
	 */
	public function member_mention(Request $request)
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
	     $user_id=$request->session()->get('user_id');
	     $Purse = Purse::where('user_id',$user_id)->first()->toArray();
       $arr= Put::where('user_id',$user_id)->first()->toArray();//个人银行信息
       if(isset($arr))
       {
       	//提现页面
         return view('fronted.member_pay.put_our',['arr'=>$arr,'Purse'=>$Purse,'data'=>$data]);
       }else
       {
       	//添加
         return view('fronted.member_pay.put_pay',['data'=>$data]);
       } 
	}
    /**
     * 添加个人银行信息
     */
    public function Add_bank(Request $request)
    {
       $user_id=$request->session()->get('user_id');
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
         return redirect('prompt')->with(['message'=>'','url' =>'member_mention', 'jumpTime'=>2,'status'=>false]);
       }else{
         return redirect('prompt')->with(['message'=>'添加失败','url' =>'member_mention', 'jumpTime'=>3,'status'=>false]);
       }
    }
     /**
    * 提现
    */
    public function addPut(Request $request)
    {
       
    }
    /**
     * 提现成功
     */
    public function putSuccess()
    {
      return view('fronted.member_pay.put_success');
    }
}