<?php
namespace App\Http\Controllers\backend;
use App\Offer;
use App\Http\Controllers\backend\BackendController;
use App\Http\Models\Debt;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\platform;
use App\Http\Models\purse;
use App\Http\Models\Message;
class OfferController extends BackendController
{
	/**
      * @access public
      * @param admin_offer_list()
      * @return array();
      * 申请借款列表
      */
     public function admin_offer_list()
     {
        $offerData = debt::get()->toArray();
        $offercount = debt::get()->count();
        return view('backend/Offer/admin_offer_list',['offerData'=>$offerData,'offercount'=>$offercount]);
    }

    /**
     * ajax修改审核状态
     * @param debt_id
    */
    public function changeDebtStatus(Request $request)
    {
        //接收数据
        $debt_status=$request['status'];
        $debt_id=$request['debt_id'];
        //借款表数据
        $debtArr=debt::where('debt_id',$debt_id)->first()->toArray();
        $money=$debtArr['debt_money']/1;
        if($debt_status==2){

            $bb=Debt::where('debt_id',$debt_id)->update(array('debt_status'=>$debt_status));
            DB::table('news')->insert(['new_title'=>'申请借款未通过','new_content'=>'您申请的'.$debtArr['debt_money'].'元借款未通过。','new_time'=>date('Y-m-d H:i:s'),'new_url'=>'member_bid_record']);
            if($bb){
                return 1;
            }else{
                return 0;
            }
        }

        //借款表数据
        $debtArr=debt::where('debt_id',$debt_id)->first()->toArray();
        $money=$debtArr['debt_money']/1;
        //平台表数据
        $platformArr=platform::first()->toArray();
        $used=$platformArr['used']/1+$money;

        $balance=$platformArr['balance']/1-$money;
        //个人钱包表数据
        $purseArr=purse::where('user_id',$debtArr['user_id'])->first()->toArray();
        $psum=$purseArr['purse_sum']/1+$money;
        $pba=$purseArr['purse_balance']/1+$money;
        //个人信息表更改
        $userInfo=Message::where('user_id',$debtArr['user_id'])->first()->toArray();
        $moneyLimit=$userInfo['message_limit']-$money;
        if($moneyLimit/1<0){
            return 2;
        }
        DB::table('news')->insert(['new_title'=>'申请借款通过','new_content'=>'您申请的'.$debtArr['debt_money'].'元借款已通过。','new_time'=>date('Y-m-d H:i:s'),'new_url'=>'member_bid_record']);
        //开启事务
        DB::beginTransaction();
        try {
            $bloon1=platform::where('platform_id',1)->update(array('used'=>$used,'balance'=>$balance));
            $bloon2=purse::where('user_id',$debtArr['user_id'])->update(array('purse_sum'=>$psum,'purse_balance'=>$pba));
            $bloon3=Message::where('user_id',$debtArr['user_id'])->update(array('message_limit'=>$moneyLimit));
            $bloon4=Debt::where('debt_id',$debt_id)->update(array('debt_status'=>$debt_status));
            if($bloon1&&$bloon2&&$bloon3&&$bloon4){
                DB::commit();
                return 1;
            }
        } catch (Exception $e) {
            DB::rollback();
            return 0;
        }
    }




}