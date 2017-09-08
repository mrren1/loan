<?php
namespace App\Http\Controllers\fronted;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Large;
class LargeController extends Controller
{
	public function index(Request $request)
	{
		if(!$request->session()->has('user_id')){
			return redirect('prompt')->with(['message'=>'使用此功能请先登录！','url' =>'index', 'jumpTime'=>2,'status'=>false]);
		}
		if($request->isMethod('POST')){
			$user_id=$request->session()->get('user_id');
			$largeArr=array(
				'user_id'		=>$user_id,
				'large_money'	=>$request['large_money'],
				'begin_time'	=>time(),
				'end_time'		=>strtotime($request['end_time']),
				'large_desc'	=>$request['large_desc'],
				'pawn_goods' 	=>$request['pawn_goods'],
				'large_phone'	=>$request['large_phone'],
			);
			if($request['post']==1){
				$largeArr['post_time']=time();
				$largeArr['post_num']=$request['post_num'];
				$largeArr['post_status']=1;
			}
			$bloon=Large::insert($largeArr);
			if($bloon){
				return redirect('prompt')->with(['message'=>'申请成功！','url' =>'index', 'jumpTime'=>2,'status'=>false]);
			}else{
				return redirect('prompt')->with(['message'=>'申请失败！','url' =>'large', 'jumpTime'=>2,'status'=>false]);
			}
		}else{
			return view('fronted/Large/large');
		}
	}
}