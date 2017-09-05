<?php
namespace App\Http\Controllers\backend;
use App\Offer;
use App\Http\Controllers\backend\BackendController;
use App\Http\Models\debt;
use Illuminate\Support\Facades\DB;
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
}