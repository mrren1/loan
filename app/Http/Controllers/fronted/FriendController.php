<?php 
namespace App\Http\Controllers\fronted;
use App\Friend;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\Friends;
use App\Http\Models\User;

class FriendController extends Controller
{
	public  function friend_list(Request $request)
	{
		$user_id=$request->session()->get('user_id');
		$friend=Friends::where('my_id',$user_id)->select('friend_id')->get();
		foreach ($friend as $key => $val) 
		{
             $friend_id[] = $val['friend_id'];    	
		}  
        if(!empty($friend_id)){
         	foreach ($friend_id as $key => $value) 
		    { 	
		 	  $res[$key]= user::where('user_id',$value)->get()->toArray(); 	
		    }
		    foreach ($res as $key =>$v)
		    {  
              $new_arr[]=$v[0];  
            }
		    return view('fronted.friend.friend_list',['res'=>$new_arr]);
		 }else{
		    return redirect('prompt')->with(['message'=>'没有好友！正在跳转……','url' =>'index', 'jumpTime'=>2,'status'=>false]);
	     }
    } 
}