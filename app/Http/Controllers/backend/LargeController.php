<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\Large;
use App\Http\Models\Message;
use App\Http\Models\Debt;
class LargeController extends BackendController
{
	/**
	 * 展示大额贷款申请的列表
	 * @return [type] [description]
	 */
    public function showList()
    {
     	$largeArr=Large::get();
     	if($largeArr!=''){
     		$largeArr=$largeArr->toArray();
     	}

     	$largeArr=$this->getUserInfo($largeArr);

     	return view('backend/Large/largelist',['largeArr'=>$largeArr]);
    }

    /**
     * 审核信息
     * @return [type] [description]
     */
    public function passcheck()
    {
    	echo "11111";
    }

    /**
     * ajax修改评估状态以及估值
     * @access public 
     * @param  large_id,large_limit
     */
    public function changelimit(Request $request)
    {
    	$large_id=$request['large_id'];
    	$large_limit=$request['limit'];
    	$bloon=Large::where('large_id',$large_id)->update(['large_limit'=>$large_limit,'large_status'=>1,'status'=>1]);
    	if($bloon){
    		return 1;
    	}else{
    		return 0;
    	}
    }

    /**
     * 展示大额贷款的信息
     * @access public 
     * @param  large_id
     */
    public function showLargeInfo()
    {
    	//大额借款ID
    	$large_id=$_GET['large_id'];
    	$largeInfo=Large::where('large_id',$large_id)->first()->toArray();
    	
    	return view('backend/Large/largeinfo',['largeInfo'=>$largeInfo]);
    }

    /**
     * 展示用户的信息
     */
    public function showUserInfo(Request $request)
    {
    	$user_id=$request['user_id'];
    	//获取用户信息
    	$messageArr=Message::where('user_id',$user_id)->first()->toArray();
    	$debtArr=Debt::where('user_id',$user_id)->get();
    	if($debtArr!=''){
    		$debtArr=$debtArr->toArray();
    		$count=count($debtArr);
    		$sum=0;
    		$alread=0;
    		$aNum=0;
    		foreach($debtArr as $debt){
    			$sum+=$debt['debt_money'];
    			if($debt['debt_addition']==1){
    				$aNum++;
    				$alread+=$debt['debt_money'];
    			}
    		}
    		$nalread=$count-$aNum;
    	}
    	return view('backend/Large/userinfo',['userinfo'=>$messageArr,'debtNum'=>$count,'moneySum'=>$sum,'alread'=>$alread,'nalread'=>$nalread]);
    } 

    /**
     * 根据用户ID获取用户信息
     * @access public 
     * @param  user_id
     */
    public function getUserInfo($largeArr)
    {
    	$messageArr=Message::select('user_id','message_name')->get()->toArray();
    	foreach($largeArr as &$large){
    		foreach($messageArr as $message){
    			if($large['user_id']==$message['user_id']){
    				$large['user_name']=$message['message_name'];
    			}
    		}
    	}
    	return $largeArr;
    }

}