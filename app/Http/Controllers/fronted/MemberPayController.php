<?php

namespace App\Http\Controllers\fronted;

use App\MemberPay;
use App\Prompt;
use App\Http\Models\Purse;
use App\Http\Models\Purselog;
use App\Http\Models\Put;
use App\Http\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
class MemberPayController extends Controller
{
  
	public function index(Request $request)
	{
      $user_id=$user_id=$request->session()->get('user_id');
      $purse = Purse::where('user_id',$user_id)->first();
      $purseLog = Purselog::where('user_id',$user_id)->get();
      if(!empty($Purse)){
        $purse=$Purse->toArray();
      }
      if(!empty($purseLog)){
        $purseLog=$purseLog->toArray();
      }
		 return view('fronted.member_pay',['purse'=>$purse,'purseLog'=>$purseLog]);
	}
    /**
   * 充值
   * 渲染页面
   */
  public function memberCharge(Request $request)
  {
    $user_id=$user_id=$request->session()->get('user_id');
    $data = Card::get()->toArray();
    $arr= Put::where('user_id',$user_id)->first();
    if(empty($arr)){
       return view('fronted.member_pay.put_pay',['data'=>$data]);
    }
    $purse=Purse::where('user_id',$user_id)->first();
    if($request->isMethod('POST')){
        $data = $request->all();
        if(!empty($purse)){
          $purse=$purse->toArray();
          if(!is_numeric($data['purse_sum']) || strlen($data['purse_sum']<1))
          {
            return redirect('prompt')->with(['message'=>'金额须为合法的整数或者小数','url' =>'memberCharge', 'jumpTime'=>3,'status'=>false]);
          }
          $purse_sum = $purse['purse_sum']+$data['purse_sum'];//钱包总金额
          $purse_balance =$purse['purse_balance']+$data['purse_sum'];//余额
          DB::beginTransaction();
          try {
          DB::table('purse')->where('purse_id',$purse['purse_id'])->update(['purse_sum'=>$purse_sum,'purse_balance'=>$purse_balance]);
          DB::commit();
            //钱包日志表
          $purseLog= new Purselog();
          $purseLog->purselog_num=$data['purse_sum'];
          $purseLog->purselog_desc='充值';
          $purseLog->purselog_time=time();
          $purseLog->user_id=$user_id;
          $purseLog->save();
          return redirect('prompt')->with(['message'=>'充值成功！','url' =>'chargeSuccess', 'jumpTime'=>3,'status'=>false]);
          }catch (PDOException $ex){
          DB::rollback();
          return redirect('prompt')->with(['message'=>'充值失败！','url' =>'memberCharge', 'jumpTime'=>3,'status'=>false]);
         }
      }
    }else{
         return view('fronted.member_pay.member_charge',['purse'=>$purse]);
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
	   $data = Card::get()->toArray();
	   $user_id=$request->session()->get('user_id');
     $purse = Purse::where('user_id',$user_id)->first();
     if(!empty($purse)){
        $purse=$purse->toArray();
     }
     $arr= Put::where('user_id',$user_id)->first();
     if(!empty($arr)){
        $arr = $arr->toArray();
     }
     if(isset($arr)){
       	//提现页面
        return view('fronted.member_pay.put_our',['arr'=>$arr,'purse'=>$purse,'data'=>$data]);
     }else{
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
       //验证
       if(empty($input['card_name']) || empty($input['put_num']) || empty($input['put_name'])){
       	 return redirect('prompt')->with(['message'=>'请完善信息！','url' =>'member_mention', 'jumpTime'=>3,'status'=>false]);
       }
       if (!preg_match("/^[\x7f-\xff]+$/",$input['card_name'])){
          return redirect('prompt')->with(['message'=>'请填写真实的名字！','url' =>'member_mention', 'jumpTime'=>3,'status'=>false]);
       }
       if(!is_numeric($input['put_num']) || strlen($input['put_num'])<19){
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
         return redirect('prompt')->with(['message'=>'正在跳转到个人账户','url' =>'member_pay', 'jumpTime'=>2,'status'=>false]);
       }else{
         return redirect('prompt')->with(['message'=>'添加失败','url' =>'member_mention', 'jumpTime'=>3,'status'=>false]);
       }
    }
     /**
    * 提现
    */
    public function addPut(Request $request)
    {
       $user_id=$request->session()->get('user_id');
       $purse=Purse::where('user_id',$user_id)->first();
       if(!empty($purse)){
        $purse = $purse->toArray();
        $data = $request->all();
        if(!is_numeric($data['purse_sum']) || $data['purse_sum']>$purse['purse_balance']){
          return redirect('prompt')->with(['message'=>'请输入正确的提现金额!','url' =>'member_mention', 'jumpTime'=>3,'status'=>false]);
        }
        $purse_used = $purse['purse_used']+$data['purse_sum'];//钱包已经使用金额
        $purse_balance =$purse['purse_balance']-$data['purse_sum'];//余额
        DB::beginTransaction();
        try {
        DB::table('purse')->where('purse_id',$purse['purse_id'])->update(['purse_used'=>$purse_used,'purse_balance'=>$purse_balance]);
        DB::commit();
        //钱包日志表
        $purseLog= new Purselog();
        $purseLog->purselog_num=$data['purse_sum'];
        $purseLog->purselog_desc='提现';
        $purseLog->purselog_time=time();
        $purseLog->user_id=$user_id;
        $purseLog->save();
        return redirect('prompt')->with(['message'=>'提现成功！','url' =>'putSuccess', 'jumpTime'=>3,'status'=>false]);
        }catch (PDOException $ex){
        DB::rollback();
        return redirect('prompt')->with(['message'=>'提现失败！','url' =>'member_mention', 'jumpTime'=>3,'status'=>false]);
        }
     }
}
    /**
     * 提现成功
     */
    public function putSuccess()
    {
      return view('fronted.member_pay.put_success');
    }
}