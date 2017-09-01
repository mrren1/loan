<?php

namespace App\Http\Controllers\fronted;

use App\MemberInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\Schema;
use App\Http\Models\Message;
use App\Http\Models\Job;
use App\Http\Models\User;
use App\Http\Models\Address;
use Illuminate\Support\Facades\DB;
use Storage;

class MemberInfoController extends Controller
{
	public function index(Request $request)
	{
		$user_id=$request->session()->get('user_id');
		if($request->isMethod('POST'))
		{
			$message_id=$request->input('message_id');
			if(!empty($message_id))
			{
				//修改数据
				$arr=$request->all();
				$tel=$arr['message_phone'];
				$name=$arr['message_name'];
				$email=$arr['message_email'];
				//验证姓名
				if(!empty($name)){
					$len=mb_strlen($name);
					if($len<2||$len>9){
						return redirect('prompt')->with(['message'=>'姓名不合格','url' =>'member_info', 'jumpTime'=>2,'status'=>false]);
					}
				}
				if(!empty($tel)){
					//验证手机号
					$reg="/^1[3,5,8]\d{9}$/";
					if(!preg_match($reg,$tel)){
						return redirect('prompt')->with(['message'=>'手机号不合格','url' =>'member_info', 'jumpTime'=>2,'status'=>false]);
					}
				}
				if(!empty($email)){
					//验证邮箱
					$reg1="/^\w+@\w+(\.)com|net|cn|edu$/";
					if(!preg_match($reg1,$email)){
						return redirect('prompt')->with(['message'=>'邮箱不合格','url' =>'member_info', 'jumpTime'=>2,'status'=>false]);
					}
				}
				//print_r($arr);die;
				$data=$this->fiter($arr);
				unset($data['_token']);
				//print_r($data);die;
				$res=Message::where("message_id",$message_id)->update($data);
				if($res)
				{
					return redirect('prompt')->with(['message'=>'修改成功','url' =>'member_info', 'jumpTime'=>3,'status'=>false]);
				}
				else
				{
					return redirect('prompt')->with(['message'=>'修改失败','url' =>'member_info', 'jumpTime'=>3,'status'=>false]);
				}
			}
			else
			{
				//添加
				$data=$request->all();

				$tel=$data['phone'];
				$name=$data['name'];
				$email=$data['email'];
				//验证姓名
				if(!empty($name)){
					$len=mb_strlen($name);
					if($len<2||$len>9){
						return redirect('prompt')->with(['message'=>'姓名不合格','url' =>'member_info', 'jumpTime'=>2,'status'=>false]);
					}
				}
				if(!empty($tel)){
					//验证手机号
					$reg="/^1[3,5,8]\d{9}$/";
					if(!preg_match($reg,$tel)){
						return redirect('prompt')->with(['message'=>'手机号不合格','url' =>'member_info', 'jumpTime'=>2,'status'=>false]);
					}
				}
				if(!empty($email)){
					//验证邮箱
					$reg1="/^\w+@\w+(\.)com|net|cn|edu$/";
					if(!preg_match($reg1,$email)){
						return redirect('prompt')->with(['message'=>'邮箱不合格','url' =>'member_info', 'jumpTime'=>2,'status'=>false]);
					}
				}
				$message=new Message;
				$message->user_id=$user_id;
				$message->message_name=$data['name'];
				$message->message_age=$data['age'];
				$message->message_sex=$data['sex'];
				$message->message_phone=$data['phone'];
				$message->message_email=$data['email'];
				$message->message_job=$data['job'];
				$message->message_revenue=$data['revenue'];
				$message->country=$data['country1'];
				$message->province=$data['province1'];
				$message->city=$data['city1'];
				$message->area=$data['area1'];
				$message->message_address=$data['address'];
				$message->message_photo=$data['photo'];
				$message->private_photo=$data['img'];
				$message->message_idcard=$data['idcard'];
				$message->message_fangcard=$data['fangcard'];
				$message->message_jiacard=$data['jiacard'];
				//print_r($message);die;
				$res=$message->save();
				if($res)
				{
					return redirect('prompt')->with(['message'=>'添加成功','url' =>'member_info', 'jumpTime'=>3,'status'=>false]);
				}
				else
				{
					return redirect('prompt')->with(['message'=>'添加失败','url' =>'member_info', 'jumpTime'=>3,'status'=>false]);
				}
			}
		}
		else
		{
			//查询message
			if(!isset($user_id))
			{
				return redirect('prompt')->with(['message'=>'没有登录，请先登录','url' =>'login', 'jumpTime'=>3,'status'=>false]);
			}
			$message=Message::where("user_id",$user_id)->first();
			//print_r($message);die;
			if(!empty($message))
			{
				$message=$message->toArray();
			}
			//print_r($message);die;
			if(!empty($message['country'])){
				$country=Address::where('address_id',$message['country'])->first()->toArray();
			}else{
				$country='';
			}
			if(!empty($message['province'])){
				$province=Address::where('address_id',$message['province'])->first()->toArray();
			}else{
				$province='';
			}
			if(!empty($message['city'])){
				$city=Address::where('address_id',$message['city'])->first()->toArray();
			}else{
				$city='';
			}
			if(!empty($message['area'])){
				$area=Address::where('address_id',$message['area'])->first()->toArray();
			}else{
				$area='';
			}
			if($country&&$province&&$city&&$area)
			{
				$message['message_address']=$country['address_name'].$province['address_name'].$city['address_name'].$area['address_name'].$message['message_address'];
			}
			//查询个人信息
			$user=User::where('user_id',$user_id)->first();
			if(!empty($user)){
				$user=$user->toArray();
			}
			//print_r($user);die;
			//工资
			$salary=array('1000-5000','5000-10000','10000-15000','15000-20000','20000-30000','30000以上');
			//查询职业
			$arr=Job::get()->toArray();
			$data=$this->GetTree($arr,$pid=0);
			//查询地区表的顶级id	
			$address=Address::where('parent_id',0)->get()->toArray();
			//print_r($address);die;
			return view('fronted.MemberInfo.member_info',['user'=>$user,'data'=>$data,'address'=>$address,'message'=>$message,'salary'=>$salary]);
		}
	}
	 /**
     * 定义字段过滤方法
     * @access public 
     * @param  array
     */
    public function fiter($data)
    {
    	$str=Schema::getColumnListing('message');
    	//print_r($str);die;
    	foreach($data as $key=>$val){
    		if(!in_array($key,$str)){
    			unset($data[$key]);
    		}
    	}
    	return $data;
    }
    /**
	 * 文件上传
	 */
	public function user_upload(Request $request)
	{	    
		$file=$request->file('user_photo');
		$user_id=$request->session()->get('user_id');
		//文件是否上传成功
	    if($file->isValid()){	//判断文件是否上传成功
	        $originalName = $file->getClientOriginalName(); //源文件名

	        $ext = $file->getClientOriginalExtension();    //文件拓展名
 			
	        $type = $file->getClientMimeType(); //文件类型
			
	        $realPath = $file->getRealPath();   //临时文件的绝对路径
			
	        $fileName = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;  //新文件名
	        $res=Storage::disk('uploads')->put($fileName,file_get_contents($realPath));   //传成功返回bool值
	        if($res){
	        	$data=array('user_photo'=>$fileName);
	        	$res=User::where("user_id",$user_id)->update($data);
	        	return $fileName;
	        }else{
	        	return 0;
	        }
	        
	    }
	}
	/**
	 * 文件上传
	 */
	public function upload(Request $request)
	{	    
		$file=$request->file('message_photo');
		//print_r($file);die;
		//文件是否上传成功
	    if($file->isValid()){	//判断文件是否上传成功
	        $originalName = $file->getClientOriginalName(); //源文件名

	        $ext = $file->getClientOriginalExtension();    //文件拓展名
 			
	        $type = $file->getClientMimeType(); //文件类型
			
	        $realPath = $file->getRealPath();   //临时文件的绝对路径
			
	        $fileName = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;  //新文件名
	        $res=Storage::disk('uploads')->put($fileName,file_get_contents($realPath));   //传成功返回bool值
	        if($res){
	        	return $fileName;
	        }else{
	        	return 0;
	        }
	        
	    }
	}
	public function id_upload(Request $request)
	{	    
		// $file=$_FILES['myfile'];
		// print_r($file);die;
		$file=$request->file('message_idcard');
		//print_r($file);die;
		//文件是否上传成功
	    if($file->isValid()){	//判断文件是否上传成功
	        $originalName = $file->getClientOriginalName(); //源文件名

	        $ext = $file->getClientOriginalExtension();    //文件拓展名
 			
	        $type = $file->getClientMimeType(); //文件类型
			
	        $realPath = $file->getRealPath();   //临时文件的绝对路径
			
	        $fileName = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;  //新文件名
	        $res=Storage::disk('uploads')->put($fileName,file_get_contents($realPath));   //传成功返回bool值
	        if($res){
	        	return $fileName;
	        }else{
	        	return 0;
	        }
	        
	    }
	}
	public function fang_upload(Request $request)
	{	    
		// $file=$_FILES['myfile'];
		// print_r($file);die;
		$file=$request->file('message_fangcard');
		//print_r($file);die;
		//文件是否上传成功
	    if($file->isValid()){	//判断文件是否上传成功
	        $originalName = $file->getClientOriginalName(); //源文件名

	        $ext = $file->getClientOriginalExtension();    //文件拓展名
 			
	        $type = $file->getClientMimeType(); //文件类型
			
	        $realPath = $file->getRealPath();   //临时文件的绝对路径
			
	        $fileName = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;  //新文件名
	        $res=Storage::disk('uploads')->put($fileName,file_get_contents($realPath));   //传成功返回bool值
	        if($res){
	        	return $fileName;
	        }else{
	        	return 0;
	        }
	        
	    }
	}
	public function jia_upload(Request $request)
	{	    
		// $file=$_FILES['myfile'];
		// print_r($file);die;
		$file=$request->file('message_jiacard');
		//print_r($file);die;
		//文件是否上传成功
	    if($file->isValid()){	//判断文件是否上传成功
	        $originalName = $file->getClientOriginalName(); //源文件名

	        $ext = $file->getClientOriginalExtension();    //文件拓展名
 			
	        $type = $file->getClientMimeType(); //文件类型
			
	        $realPath = $file->getRealPath();   //临时文件的绝对路径
			
	        $fileName = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;  //新文件名
	        $res=Storage::disk('uploads')->put($fileName,file_get_contents($realPath));   //传成功返回bool值
	        if($res){
	        	return $fileName;
	        }else{
	        	return 0;
	        }
	        
	    }
	}
	public function img_upload(Request $request)
	{	    
		// $file=$_FILES['myfile'];
		// print_r($file);die;
		$file=$request->file('private_photo');
		//print_r($file);die;
		//文件是否上传成功
	    if($file->isValid()){	//判断文件是否上传成功
	        $originalName = $file->getClientOriginalName(); //源文件名

	        $ext = $file->getClientOriginalExtension();    //文件拓展名
 			
	        $type = $file->getClientMimeType(); //文件类型
			
	        $realPath = $file->getRealPath();   //临时文件的绝对路径
			
	        $fileName = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;  //新文件名
	        $res=Storage::disk('uploads')->put($fileName,file_get_contents($realPath));   //传成功返回bool值
	        if($res){
	        	return $fileName;
	        }else{
	        	return 0;
	        }
	        
	    }
	}
	/**
	 * 获取当前地区
	 */
	public function getAddress(Request $request,$parent_id=0)
	{
		//获取当前id
		$address_id=$request->get('address_id');
		$address=Address::where('parent_id',$address_id)->get()->toArray();
		echo json_encode($address);
	}
	public function GetTree($arr,$pid=0,$dd='')
    {
        //定义数组
       	$data=array();
        foreach($arr as $k => $v)
        {
            if($v['parent_id']==$pid)
            {
                $data[$k]=$v;
                $data[$k]['dd']=$dd;
                $data[$k]['child']=$this->GetTree($arr,$v['job_id'],$dd.'----');
            }
        }
        return $data;
    }
    
}