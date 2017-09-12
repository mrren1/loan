<?php
namespace App\Http\Controllers\backend;
use App\Member;
use App\Http\Controllers\backend\BackendController;
use App\Http\Models\debt;
use App\Http\Models\lend;
use App\Http\Models\User;
use App\Http\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MemberController extends BackendController
{

    public function member_sign()
    {
     	return view('backend/Member/member_scoreoperation');
    }
      public function sign_add()
    {
        return view('backend/Member/sign_add');
    }
    //查询会员用户信息
    public function admin_member_msg()
    {
        $member_msg = DB::table('message')->get();
        return view( 'backend/Member/admin_member_msg',[ "member_msg" => $member_msg ] );
    }
     //会员一键审核 ---》》》 修改审核状态为  --未审核--
    public function admin_member_stop()
    {
        if($request->isMethod('POST')){
            $arr = $request->all();    
            $id  = $arr['id'];
            $status = "'0,0,0,0,0'";
            $status =  DB::update("update message set message_stars = $status where message_id = $id" );
            return json_encode($status);
        }
    }
    //会员一键审核 ---》》》 修改审核状态为  --审核通过--
    public function admin_member_start(Request $request)
    {
        if($request->isMethod('POST')){
            $arr = $request->all();    
            $id = $arr['id'];
            $status = "'1,1,1,1,1'";
            $status =  DB::update("update message set message_stars = $status where message_id = $id" );
            return json_encode($status);
        }
    }
     //会员一键审核 ---》》》 修改审核状态为  --审核页--
    public function admin_mpm_status(Request $request)
    {  
        if($request->isMethod('GET')){
            $arr = $request->all();    
            $id = $arr['message_id'];
            $member_msg = Message::where("message_id",$id)->get();
            return view('backend/Member/admin_mpm_status',[ 'member_msg'=>$member_msg ]);  
        }
    }
     //会员一键审核 ---》》》 修改审核状态为  --填写审核值-- 不填写自动填充零 后期跟进更新方法 填写 多了 自动更截取 等 相关的兼容 可以写个方法封装起来直接传值调用最好
    public function admin_mpm_status_do()
    {  
        if($request->isMethod('GET')){
            $arr = $request->all();    
            $id = $arr['id'];
            $mpm_status_end = "'" . $arr[ "mpm_status" ]  . "," . $arr[ "mpm_status1" ] 
                            . "," . $arr[ "mpm_status2" ] . "," . $arr[ "mpm_status3" ] 
                            . "," . $arr[ "mpm_status4" ] . "'";
            $sql ="update message set message_stars = $mpm_status_end where message_id = $id";
            return json_encode( DB::update( $sql ) );
        }
    }
    //用户信息 展示
     public function admin_user_list()
     {  
        $UserData = User::get()->toArray();
        return view('backend/User/admin_user_list',[ 'UserData'=>$UserData ]);  

     }
      // 用户 ---》》》 修改审核状态为  --黑名单--
     public function admin_user_stop(Request $request)
     {
        if($request->isMethod('GET')){
            $arr = $request->all();    
            $id = $arr['id'];
            $status =  0 ;
            $status =  DB::update( "update user set user_black = $status where user_id = $id" );
            return json_encode($status);
        }
     }
     // 用户 ---》》》 修改审核状态为  --白名单--
     public function admin_user_start()
     {
        if($request->isMethod('GET')){
            $arr = $request->all();    
            $id = $arr['id'];
            $status =  1 ;
            $status =  DB::update( "update user set user_black = $status where user_id = $id" );
            return json_encode($status);
        }
     }
     // 用户 ---》》》 用户会员相关  -- 详细信息展示 --
     public function admin_user_show()
     {
        if($request->isMethod('GET')){
            $arr = $request->all();    
            $id = $arr['id'];
            $member_msg = Message::where("user_id",$id)->get();
            return view('backend/User/admin_user_show',[ 'member_msg'=>$member_msg ]);  
        }
     }
     //贷款一键审核 ---》》》 修改审核状态为  --未审核--
     // public function admin_loan_list_stop()
     // {
     //    $id = $_POST['id'];
     //    $status = 0;
     //    $status =  DB::update("update lend set lend_status = $status where lend_id = $id" );
     //    $status = json_encode($status);
     //    return $status;
     // }
     //贷款一键审核 ---》》》 修改审核状态为  --审核通过--
     // public function admin_loan_list_start()
     // {
     //    $id = $_POST['id'];
     //    $status = 1;
     //    $status =  DB::update("update lend set lend_status = $status where lend_id = $id" );
     //    $status = json_encode($status);
     //    return $status;
     // }
 }