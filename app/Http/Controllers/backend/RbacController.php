<?php
namespace App\Http\Controllers\backend;
use App\Rbac;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\Role;
use App\Http\Models\Node;
use App\Http\Models\RoleNode;
use App\Http\Models\Admin;
use App\Http\Models\Adminrole;
class RbacController extends BackendController
{
     /**
      * 角色添加
      */
     public function admin_role_add(Request $request)
     {
        if($request->isMethod('POST')){
           $role =new Role;
           $role ->role_name=$request['role_name'];
           $role ->role_desc=$request['role_desc'];
           $info =$role->save();
        }else{
           return view('backend/Rbac/admin_role_add');
        } 
     }

     /**
      * @access public
      * @param admin_permission() 角色列表
      * @return  [description]
      */
     public function admin_permission()
     {
        $roleData = Role::get();
        $role_num = Role::get()->count();
        if(isset($roleData)){
          $roleData = $roleData->toArray();
        }else{
          $roleData = [];
        }
        return view('backend/Rbac/admin_permission',['roleData'=>$roleData,'role_num'=>$role_num]);
     }

     /**
      * @access public
      * @param admin_permission() 设置权限
      * @return  [description]
      */
     public function admin_permission_add(Request $request)
     {
        $role_id = $request['role_id'];
        $node_id = RoleNode::where('role_id',$role_id)->pluck('node_id')->toArray();
        $nodeData['has'] = Node::whereIn('node_id',$node_id)->select('node_id','node_name')->get()->toArray();
        $nodeData['no'] = Node::whereNotIn('node_id',$node_id)->select('node_id','node_name')->get()->toArray();
        return view('backend/Rbac/admin_permission_add',['nodeData'=>$nodeData,'role_id'=>$role_id]);
     }
        /**
      * @access public
      * @param admin_permission() 设置角色
      * @return  [description]
      */
     public function role_premission(Request $request)
     {
        $admin_id = $request['admin_id'];
        $adminroleData = adminrole::where('admin_id',$admin_id)->get()->toArray();
        foreach($adminroleData as $key => $val){
          $roleId[] = $val['role_id'];
        }
        $powerData = role::get()->toArray();
        if(!empty($roleId)){
          foreach($powerData as $key => $val){
            if(in_array($val['role_id'],$roleId)){
              $nodeData['has'][$key]['role_id'] = $val['role_id'];
              $nodeData['has'][$key]['role_name'] = $val['role_name'];
            }else{
              $nodeData['no'][$key]['role_id'] = $val['role_id'];
              $nodeData['no'][$key]['role_name'] = $val['role_name'];
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
         return view('backend/Rbac/rolepermission',['nodeData'=>$nodeData,'admin_id'=>$admin_id]);
     }
     /**
      * @access public
      * @param setPower() 角色添加
      * @return  [description]
      */
     public function setrole(Request $request)
     {
          $adminRole = new Adminrole;
          $admin_id = $request['admin_id'];
          $has = $request['has'];
          $no = $request['no'];
          if(empty($has) && !empty($no)){
              $bloon = Adminrole::where('admin_id',$admin_id)->delete();
              $noData = explode(',',$no);
              foreach($noData as $key => $val){
                  $data[$key]['admin_id'] = $admin_id; 
                  $data[$key]['role_id'] = $val; 
              }
              $info = DB::table('admin_role')->insert($data);
              if(!$info){
                  return 0;
              }
          }else if(!empty($has) && !empty($no)){
              $bloon = adminrole::where('admin_id',$admin_id)->delete();
              $hasData = explode(',',$has);
              foreach($hasData as $k => $v){
                  $tmp[$k]['admin_id'] = $admin_id; 
                  $tmp[$k]['role_id'] = $v; 
              }
              $result = DB::table('admin_role')->insert($tmp);
              $noData = explode(',',$no);
              foreach($noData as $key => $val){
                  $data[$key]['admin_id'] = $admin_id; 
                  $data[$key]['role_id'] = $val; 
              }
              $info = DB::table('admin_role')->insert($data);
              if(!$bloon || !$result || !$info){
                  return 0;
              }
          }else if(!empty($has) && empty($no)){
              $bloon = adminrole::where('admin_id',$admin_id)->delete();
              $hasData = explode(',',$has);
              foreach($hasData as $k => $v){
                  $tmp[$k]['admin_id'] = $admin_id; 
                  $tmp[$k]['role_id'] = $v; 
              }
              $result = DB::table('admin_role')->insert($tmp);
              if(!$bloon || !$result){
                  return 0;
              }
          }else{
              $bloon = adminrole::where('admin_id',$admin_id)->delete();
              if(!$bloon){
                  return 0;
              }
          }
          //返回数据
          $roleNodeData = adminRole::where('admin_id',$admin_id)->get()->toArray();
          foreach($roleNodeData as $key => $val){
            $roleId[] = $val['role_id'];
          }
          $powerData = role::get()->toArray();
          if(!empty($roleId)){
            foreach($powerData as $key => $val){
              if(in_array($val['role_id'],$roleId)){
                $nodeData['has'][$key]['role_id'] = $val['role_id'];
                $nodeData['has'][$key]['role_name'] = $val['role_name'];
              }else{
                $nodeData['no'][$key]['role_id'] = $val['role_id'];
                $nodeData['no'][$key]['role_name'] = $val['role_name'];
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
      * @param setPower() 权限添加
      * @return  [description]
      */
      public function setPower(Request $request)
      {    
          $rolenode = new Rolenode;
          $role_id = $request['role_id'];
          $has = $request['has'];
          $no = $request['no'];
          if(empty($has) && !empty($no)){
              $bloon = $this->delete($role_id);
              $noData = explode(',',$no);
              $data = $this->process($noData,$role_id);
              $info = DB::table('role_node')->insert($data);
              if(!$info || $bloon){
                  return 0;
              }
          }else if(!empty($has) && !empty($no)){
              $bloon = $this->delete($role_id);
              $hasData = explode(',',$has);
              $tmp = $this->process($hasData,$role_id);
              $result = DB::table('role_node')->insert($tmp);
              $noData = explode(',',$no);
              $data = $this->process($noData,$role_id);
              $info = DB::table('role_node')->insert($data);
              if(!$bloon || !$result || !$info){
                  return 0;
              }
          }else if(!empty($has) && empty($no)){
              $bloon = $this->delete($role_id);
              $hasData = explode(',',$has);
              $tmp = $this->process($hasData,$role_id);
              $result = DB::table('role_node')->insert($tmp);
              if(!$bloon || !$result){
                  return 0;
              }
          }else{
              $bloon = $this->delete($role_id);
              if(!$bloon){
                  return 0;
              }
          }
          //返回数据
          $node_id = RoleNode::where('role_id',$role_id)->pluck('node_id')->toArray();
          $nodeData['has'] = Node::whereIn('node_id',$node_id)->select('node_id','node_name')->get()->toArray();
          $nodeData['no'] = Node::whereNotIn('node_id',$node_id)->select('node_id','node_name')->get()->toArray();
          return json_encode($nodeData);
      }

      /**
       * 处理数组
       * @access public
       * @param process();
       * @return array();
       */
      public function process($data,$role_id)
      {
          foreach($data as $key => $val){
              $arr[$key]['role_id'] = $role_id; 
              $arr[$key]['node_id'] = $val; 
          }
          return $arr;
      }

      /**
       * 删除数据
       * @access public
       * @param delete();
       * @return true or false;
       */
      public function delete($role_id)
      {
          $bloon = RoleNode::where('role_id',$role_id)->delete();
          return $bloon;
      } 

      /**
      * @access public
      * @param setPower() 权限列表
      * @return  [description]
      */
     public function admin_power_list()
     {
        $nodeData = Node::get();
        $node_num = Node::get()->count();
        if(isset($nodeData)){
          $nodeData = $nodeData->toArray();
        }else{
          $nodeData = [];
        }
        return view('backend/Rbac/admin_list',['nodeData'=>$nodeData,'node_num'=>$node_num]);
     }

     /**
      * @access public
      * @param 添加权限列表
      * @return  [description]
      */
     public function admin_add(Request $request)
     {
        return view('backend/Rbac/admin_add');
     }

     /**
      * @access public
      * @param 添加权限
      * @return  [description]
      */
     public function admin_add_power(Request $request)
     {
        $node = new Node;
        $node->node_name = $request['node_name'];
        $node->node_desc = $request['node_desc'];
        $info = $node->save();
        if($info){
          return 1;
        }else{
          return 0;
        }
     }

     /**
      * @access public
      * @param admin_power() 管理员列表
      * @return  [description]
      */
      public function admin_power()
     {
        $adminData = Admin::get();
        $admin_num = Admin::get()->count();
       	return view('backend/Rbac/admin_power',['adminData'=>$adminData,'admin_num'=>$admin_num]);
     }

      /**
      * @access public
      * @param admin_add_any() 添加管理员列表
      * @return  [description]
      */
     public function admin_add_any()
     {
        return view('backend/Rbac/admin_add_any');
     }

      /**
      * @access public
      * @param add_admin() 添加管理员列表
      * @return  [description]
      */
     public function add_admin(Request $request)
     {
        $admin = new Admin;
        $admin->admin_name = $request['admin_name'];
        $admin->admin_pwd = encrypt($request['admin_pwd']);
        $admin->log_time = time();
        $info = $admin->save();
        if($info){
          return 1;
        }else{
          return 0;
        }
     }

     /**
      * @access public
      * @param deleteAdmin() 删除管理员
      * @return  [description]
      */
     public function deleteAdmin(Request $request)
     {
        $admin_id = $request['admin_id'];
        AdminRole::where('admin_id',$admin_id)->delete();
        $bloon = Admin::where('admin_id',$admin_id)->delete();
        if($bloon){
          return 1;
        }else{
          return 0;
        }
     }

     /**
      * @access public
      * @param deleteRole() 删除角色
      * @return  [description]
      */
     public function deleteRole(Request $request)
     {
        $role_id = $request['role_id'];
        AdminRole::where('role_id',$role_id)->delete();
        RoleNode::where('role_id',$role_id)->delete();
        $bloon = Role::where('role_id',$role_id)->delete();
        if($bloon){
          return 1;
        }else{
          return 0;
        }
     }

     /**
      * @access public
      * @param deleteNode() 删除权限
      * @return  [description]
      */
     public function deleteNode(Request $request)
     {
        $node_id = $request['node_id'];
        $bloon = Node::where('node_id',$node_id)->delete();
        if($bloon){
          return 1;
        }else{
          return 0;
        }
     }
}