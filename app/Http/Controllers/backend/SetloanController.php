<?php
namespace App\Http\Controllers\backend;
use App\Setloan;
use App\Http\Controllers\backend\BackendController;
use App\Http\Models\lend;
use App\Http\Models\purse;
use App\Http\Models\Platform;
use App\Http\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class SetloanController extends BackendController
{

    //贷款通过状态
    private $pass_status = 1;
    //贷款不通过状态
    private $not_pass_status = 2;

	   /**
      * @access public
      * @param admin_loan_list()
      * @return array();
      * 发布代款列表
      */
     public function admin_loan_list()
     {
        $setloanData = lend::get()->toArray();
        $setloancount = lend::get()->count();
        return view('backend/Setloan/admin_loan_list',['setloanData'=>$setloanData,'setloancount'=>$setloancount]);  
     }

     /**
      * @access public
      * @param admin_loan_list_start()
      * @return success:1 , error:0 ;
      * 修改通过代款状态
      */
     public function admin_loan_list_start(Request $request)
     {
        $lend_id = $request['lend_id'];
        $user_id = $request['user_id'];
        $user_name = User::where('user_id',$user_id)->pluck('user_name')->first();
        $lendData = lend::where('lend_id',$lend_id)->select('lend_id','lend_money')->get()->first()->toArray();
        $purseData = purse::where('user_id',$user_id)->get()->first()->toArray();
        if($purseData['purse_sum'] >= $lendData['lend_money']){
            DB::beginTransaction();
            try{  
                $purse_sum = $purseData['purse_sum']-$lendData['lend_money'];
                $purse_used = $purseData['purse_used']+$lendData['lend_money'];
                $purse_balance = $purse_sum-$purse_used;
                $result = purse::where('user_id',$user_id)->update(['purse_sum'=>$purse_sum,'purse_used'=>$purse_used,'purse_balance'=>$purse_balance]);
                $platformData = platform::get()->first()->toArray();
                $money = $platformData['money']+$lendData['lend_money'];
                $balance = $platformData['balance']+$lendData['lend_money'];
                $bloon = platform::where('platform_id',$platformData['platform_id'])->update(['money'=>$money,'balance'=>$balance]);
                $info = lend::where('lend_id',$lend_id)->update(['lend_status'=>$this->pass_status]);
                $purselog = $this->insertLog('purselog','-'.$lendData['lend_money'].'元','贷款审核成功,转账平台-'.$lendData['lend_money'].'元',$user_id);
                $formlog = $this->insertLog('platformlog','+'.$lendData['lend_money'].'元',$user_name.'发布贷款成功,收到转账+'.$lendData['lend_money'].'元',$user_id);
                if($result && $platformData && $bloon && $info && $purselog && $formlog){
                    DB::commit();  
                    return 1; 
                }
            }catch(\Exception $e){  
                DB::rollBack();  
                return 0;
            }   
        }else{
            return 2;
        }
     }

     /**
      * @access public
      * @param admin_loan_list_stop()
      * @return success:1 , error:0 ;
      * 修改未通过代款状态
      */
     public function admin_loan_list_stop(Request $request)
     {
        $lend_id = $request['lend_id'];
        $bloon = lend::where('lend_id',$lend_id)->update(['lend_status'=>$this->not_pass_status]);
        if($bloon){
            return 1;
        }else{
            return 0;
        }
     }
}