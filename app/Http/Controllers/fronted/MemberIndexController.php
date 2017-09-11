<?php

namespace App\Http\Controllers\fronted;

use App\MemberIndex;
use App\Http\Models\Purse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\fronted\Controller;

class MemberIndexController extends Controller
{
	public function index(Request $request)
	{
	  $user_id=$request->session()->get('user_id');
	  $Purse = Purse::where('user_id',$user_id)->first();
      if(!empty($Purse))
      {
        $Purse=$Purse->toArray();
      }//获取用户钱包数据
	  return view('fronted.member_index',['Purse'=>$Purse]);
	}

}