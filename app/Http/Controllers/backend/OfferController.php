<?php
namespace App\Http\Controllers\backend;
use App\Offer;
use App\Http\Controllers\backend\BackendController;
use App\Http\Models\Debt;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\platform;
use App\Http\Models\purse;
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
        $offerData = debt::orderBy('debt_id','debt_btime')->get()->toArray();
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
        $money=$debtArr['debt_money'];
        //平台表数据
        $platformArr=platform::first()->toArray();
        $used=$platformArr['used']+$money;
        $balance=$platformArr['balance']-$money;
        //个人钱包表数据
        $purseArr=purse::where('user_id',$debtArr['user_id'])->first()->toArray();
        //开启事务
        DB::transaction(function(){
            
        });

        // $bloon=Debt::where('debt_id',$debt_id)
        //     ->update([
        //         'debt_status'=>$debt_status,
        //     ]);
        // if($bloon){
        //     echo 1;
        // }else{
        //     echo 0;
        // }
    }




}