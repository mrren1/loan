<?php 
namespace App\Http\Controllers\fronted;
use App\Friend;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\Friends;
use App\Http\Models\User;
use App\Http\Models\Purse;

class FriendController extends Controller
{
    /**
     * 好友列表
     * @param  Request $request [description]
     * @return [type]           [description]
     */
	public  function friend_list(Request $request)
	{
		$user_id=$request->session()->get('user_id');
		$friend=Friends::where('my_id',$user_id)->select('friend_id')->get();
		foreach ($friend as $key => $val){
             $friend_id[] = $val['friend_id'];    	
		}  
        if(!empty($friend_id)){
            foreach ($friend_id as $key => $value){   
              $res[$key]= user::where('user_id',$value)->select('user_id','user_name','user_photo')->get()->toArray();  
            }
            foreach ($res as $key =>$v){  
              $new_arr[$key]=$v[0];
            }
        }else{
            $new_arr=[];
        }
	    return view('fronted.friend.friend_list',['res'=>$new_arr,'user_id'=>$user_id]);
    } 

    /**
     * 好友的转账
     * @access public 
     */
    public function turnmoney(Request $request)
    {
        //获取数据
        $my_id = $request['my_id'];
        $friend_id = $request['friend_id'];
        $money = $request['money'];
        //验证金钱是否足够
        $userPurse = Purse::where('user_id',$my_id)->first();
        $friendPurse = Purse::where('user_id',$friend_id)->first();
        if($userPurse->purse_balance < $money){
            return 0;//余额不足
        }
        $myName = $this->getUserName($my_id);
        $friendName = $this->getUserName($friend_id);
        //转账
        DB::beginTransaction();
        try {
            $b1 = Purse::where('user_id',$my_id)->update(array(
                'purse_used'    => $userPurse->purse_used+$money,
                'purse_balance' => $userPurse->purse_balance-$money
            ));
            $b2 = Purse::where('user_id',$friend_id)->update(array(
                'purse_sum'     => $friendPurse->purse_sum+$money,
                'purse_balance' => $friendPurse->purse_balance+$money
            ));
            $b3 = $this->insertLog('purselog','-'.$money.'元',"转账给".$friendName."-".$money."元。",$my_id);
            $b4 = $this->insertLog('purselog','+'.$money.'元','收到'.$myName.'的转账+'.$money.'元。',$friend_id);
            if($b1 && $b2 && $b3 && $b4){
                DB::commit();
                $new=array(
                    'user_id'       => $friend_id,
                    'new_title'     => '收到转账',
                    'new_content'   => '收到来自'.$myName.'的转账，共'.$money.'元。',
                    'new_time'      => date('Y-m-d H:i:s'),
                    'new_url'       => 'member_index'
                );
                DB::table('news')->insert($new);
                return 1;//转账成功
            }else{
                return 3;//转账失败
            }
        } catch (Exception $e) {
            DB::rollback();
            return 2;//转账失败
        }
    }
    
    /**
     * 根据userId获取用户名
     * @access public 
     * @param  userId
     */
    public function getUserName($userId)
    {
        $obj = User::where('user_id',$userId)->select('user_name')->first();
        return $obj->user_name;
    }

    /**
     * 查找好友
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function friend_sele(Request $request)
    {
    	$friend = $request->input('friend');
        $user_id = $request->session()->get('user_id');
    	$userArr=User::where('user_name',$friend)->first();
        if($userArr->user_id==$user_id){
            return 1;
        }
    	if(!empty($userArr)){
			return $userArr;
    	}else{
    		return 0;
    	}
    	
    }

    /**
     * 好友的添加
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function friend_add(Request $request)
    {
    	$friend_id=$request->input('friend_id');
    	$user_id=$request->session()->get('user_id');
    	$result=Friends::where(['friend_id' => $friend_id,'my_id'=>$user_id])->first();
    	if($result!=''){
    		return 2;
    	}else{
    		$friendArr=User::where('user_id',$friend_id)->select('user_id','user_name','user_photo')->first();
            $friends=new Friends;
	    	$friends->friend_id=$friend_id;
	    	$friends->my_id=$user_id;
	    	$res = $friends->save();
	    	return $res ? json_encode($friendArr) : 0;
    	}
    }

    /**
     * 好友的删除
     * @access public
     * @param  my_id,friend_id
     * @return 1,0
     */
    public function friendDel(Request $request)
    {
        $my_id = $request['my_id'];
        $friend_id = $request['friend_id'];
        $bloon = DB::table('friend')->where(array('my_id' => $my_id, 'friend_id' => $friend_id))->delete();
        return $bloon ? 1 : 0;
    }


}
