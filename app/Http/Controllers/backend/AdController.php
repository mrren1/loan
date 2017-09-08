<?php
namespace App\Http\Controllers\backend;

use App\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support;
use Illuminate\Support\Facades\Input;
use App\Http\Models\Lend;
use App\Http\Models\Advert;

class AdController extends BackendController
{
     public function ad_list()
     {
          $ad_arr=Advert::orderBy('lend_money','desc')->get()->toArray();
          
          return view('backend/Ad/ad_list',array('ad_arr'=>$ad_arr)); 
     }
     public function ad_add(Request $request)
     {
     	if($request->isMethod('POST'))
     	{
     		$data=$request->all();
     		$ad = new Advert();
     		$ad->lend_id=$data['lend_id'];
     		$ad->ad_name=$data['ad_name'];
     		$ad->ad_desc=$data['ad_desc'];
     		$ad->lend_money=$data['lend_money'];
     		$res = $ad->save();
     		if($res)
     		{
     			return redirect('prompt')->with(['message'=>'添加成功','url' =>'ad_list', 'jumpTime'=>3,'status'=>false]);
     		}
     		else
     		{
     			return redirect('prompt')->with(['message'=>'添加失败','url' =>'ad_list', 'jumpTime'=>3,'status'=>false]);
     		}
     	}
     	else
     	{
			$lend_arr = DB::table('lend')->join('user','lend.user_id','=','user.user_id')->select('user_name','lend_id')->get()->toArray();
     	 	return view('backend/Ad/ad_add',['lend_arr'=>$lend_arr]);
     	}
    	 
    	 
     }
}