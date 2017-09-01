<?php
namespace App\Http\Controllers\backend;
use App\Rbac;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\Role;
use App\Http\Models\Node;
use App\Http\Models\RoleNode;
class RbacController extends Controller
{
     /**
      * 角色添加
      */
     public function admin_role_add()
     {
     	return view('backend/Rbac/admin_role_add');
     }

     /**
      * @access public
      * @param admin_permission() 角色列表
      * @return  [description]
      */
     public function admin_permission()
     {
        $roleData = role::get();
        if(isset($roleData)){
          $roleData = $roleData->toArray();
        }else{
          $roleData = [];
        }
        return view('backend/Rbac/admin_permission',['roleData'=>$roleData]);
     }

     /**
      * @access public
      * @param admin_permission() 设置权限
      * @return  [description]
      */
     public function admin_permission_add(Request $request)
     {
        $role_id = $request['role_id'];
        $roleNodeData = rolenode::where('role_id',$role_id)->get()->toArray();
        foreach($roleNodeData as $key => $val){
          $nodeId[] = $val['node_id'];
        }
        $powerData = node::get()->toArray();
        if(!empty($nodeId)){
          foreach($powerData as $key => $val){
            if(in_array($val['node_id'],$nodeId)){
              $nodeData['has'][$key]['node_id'] = $val['node_id'];
              $nodeData['has'][$key]['node_name'] = $val['node_name'];
            }else{
              $nodeData['no'][$key]['node_id'] = $val['node_id'];
              $nodeData['no'][$key]['node_name'] = $val['node_name'];
            }
          }
          if(!isset($nodeData['no'])){
              $nodeData['no'] = [];
          }
        }else{
          $nodeData = [
            'has' => [],
            'no' => $powerData,
          ]; 
        }  
        return view('backend/Rbac/admin_permission_add',['nodeData'=>$nodeData,'role_id'=>$role_id]);
     }

     /**
      * @access public
      * @param setPower() 权限添加
      * @return  [description]
      */
      public function setPower(Request $request)
      {    
          $rolenode = new rolenode;
          $role_id = $request['role_id'];
          $has = $request['has'];
          $no = $request['no'];
          if(empty($has) && !empty($no)){
              $bloon = rolenode::where('role_id',$role_id)->delete();
              $noData = explode(',',$no);
              foreach($noData as $key => $val){
                  $data[$key]['role_id'] = $role_id; 
                  $data[$key]['node_id'] = $val; 
              }
              $info = DB::table('role_node')->insert($data);
              if(!$info){
                  return 0;
              }
          }else if(!empty($has) && !empty($no)){
              $bloon = rolenode::where('role_id',$role_id)->delete();
              $hasData = explode(',',$has);
              foreach($hasData as $k => $v){
                  $tmp[$k]['role_id'] = $role_id; 
                  $tmp[$k]['node_id'] = $v; 
              }
              $result = DB::table('role_node')->insert($tmp);
              $noData = explode(',',$no);
              foreach($noData as $key => $val){
                  $data[$key]['role_id'] = $role_id; 
                  $data[$key]['node_id'] = $val; 
              }
              $info = DB::table('role_node')->insert($data);
              if(!$bloon || !$result || !$info){
                  return 0;
              }
          }else if(!empty($has) && empty($no)){
              $bloon = rolenode::where('role_id',$role_id)->delete();
              $hasData = explode(',',$has);
              foreach($hasData as $k => $v){
                  $tmp[$k]['role_id'] = $role_id; 
                  $tmp[$k]['node_id'] = $v; 
              }
              $result = DB::table('role_node')->insert($tmp);
              if(!$bloon || !$result){
                  return 0;
              }
          }else{
              echo 1;
              $bloon = rolenode::where('role_id',$role_id)->delete();
              if(!$bloon){
                  return 0;
              }
          }
          //返回数据
          $roleNodeData = rolenode::where('role_id',$role_id)->get()->toArray();
          foreach($roleNodeData as $key => $val){
            $nodeId[] = $val['node_id'];
          }
          $powerData = node::get()->toArray();
          if(!empty($nodeId)){
            foreach($powerData as $key => $val){
              if(in_array($val['node_id'],$nodeId)){
                $nodeData['has'][$key]['node_id'] = $val['node_id'];
                $nodeData['has'][$key]['node_name'] = $val['node_name'];
              }else{
                $nodeData['no'][$key]['node_id'] = $val['node_id'];
                $nodeData['no'][$key]['node_name'] = $val['node_name'];
              }
            }
            if(!isset($nodeData['no'])){
                $nodeData['no'] = [];
            }
          }else{
            $nodeData = [
              'has' => [],
              'no' => $powerData,
            ]; 
          }
          return json_encode($nodeData);
      }

      /**
      * @access public
      * @param setPower() 权限列表
      * @return  [description]
      */
     public function admin_power_list()
     {
        $nodeData = node::get();
        if(isset($nodeData)){
          $nodeData = $nodeData->toArray();
        }else{
          $nodeData = [];
        }
        return view('backend/Rbac/admin_list',['nodeData'=>$nodeData]);
     }

     /**
      * 管理员添加
      */
      public function admin_add()
     {
     	return view('backend/Rbac/admin_add');
     }
}