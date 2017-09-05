<?php
namespace App\Http\Controllers\backend;
use App\Member;
use App\Http\Controllers\backend\BackendController;
use App\Http\Models\debt;
use App\Http\Models\lend;
use Illuminate\Support\Facades\DB;
class MemberController extends BackendController
{
     public function member_list()
     {
     	 return view('backend/Member/member_list');
     }
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
        $id = $_POST['id'];
        $status = "'0,0,0,0,0'";
        $status =  DB::update("update message set message_stars = $status where message_id = $id" );
        $status = json_encode($status);
        return $status;
     }
     //会员一键审核 ---》》》 修改审核状态为  --审核通过--
       public function admin_member_start()
     {
        $id = $_POST['id'];
        $status = "'1,1,1,1,1'";
        $status =  DB::update("update message set message_stars = $status where message_id = $id" );
        $status = json_encode($status);
        return $status;
     }
     //会员一键审核 ---》》》 修改审核状态为  --审核页--
     public function admin_mpm_status()
     {  

        return view( 'backend/Member/admin_mpm_status' );
     }
     //会员一键审核 ---》》》 修改审核状态为  --填写审核值-- 不填写自动填充零 后期跟进更新方法 填写 多了 自动更截取 等 相关的兼容 可以写个方法封装起来直接传值调用最好
     public function admin_mpm_status_do()
     {  
        $id = $_GET[ 'id' ];

        $mpm_status = "'" . $_GET[ "mpm_status" ];
        $mpm_status_num = substr_count($mpm_status,'0')+substr_count($mpm_status,'1');
        if ( $mpm_status_num < 5 ) {
            $mpm_status_num = 5 - $mpm_status_num;
            for ($i=0; $i < $mpm_status_num; $i++) { 
            $mpm_status .= ",0" ;
                
            }
        }
        $mpm_status .= "'";

        $sql ="update message set message_stars = $mpm_status where message_id = $id";
        $status =  DB::update( $sql );
        $status = json_encode($status);
        return $status;
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

     /**
      * @access public
      * @param admin_loan_list()
      * @return array();
      * 发布代款列表
      */
     public function admin_loan_list()
     {
        $setloanData = lend::get()->toArray();
        $setloancount = lend::get()->count();
        return view('backend/Member/admin_loan_list',['setloanData'=>$setloanData,'setloancount'=>$setloancount]);  
     }
 }