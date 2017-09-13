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
		 	//return view('fronted.friend.friend_list',['res'=>$new_arr]);
		    return redirect('prompt')->with(['message'=>'没有好友！正在跳转……','url' =>'index', 'jumpTime'=>2,'status'=>false]);
	     }
    } 
    public function friend_sele(Request $request)
    {
    	$friend=$request->input('friend');
    	$userArr=User::where('user_name',$friend)->first();
    	if(!empty($userArr)){
			return $userArr;
    	}else{
    		return 0;
    	}
    	
    }
    public function friend_add(Request $request)
    {
    	$friend_id=$request->input('friend_id');
    	$user_id=$request->session()->get('user_id');
    	$result=Friends::where('friend_id',$friend_id)->get();
    	if($result){
    		return 2;
    	}else{
    		$friends=new Friends;
	    	$friends->friend_id=$friend_id;
	    	$friends->my_id=$user_id;
	    	$res = $friends->save();
	    	return $res ? 1 : 0;
    	}
    	
    }
}