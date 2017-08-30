<?php

namespace App\Http\Controllers;

use App\MemberInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Message;
use App\Http\Models\Job;
use App\Http\Models\Address;
use Illuminate\Support\Facades\DB;
use Storage;

class MemberInfoController extends Controller
{
	public function index(Request $request)
	{
		if($request->isMethod('POST'))
		{
			$data=$request->all();
			// $photo = $request->file('message_photo');	
			// print_r();die;
			// print_r($file);die;
			$message=new Message;
			$message->user_id=13;
			$message->message_name=$data['message_name'];
			$message->message_age=$data['message_age'];
			$message->message_sex=$data['message_sex'];
			$message->message_phone=$data['message_phone'];
			$message->message_email=$data['message_email'];
			$message->message_job=$data['message_job'];
			$message->message_revenue=$data['message_revenue'];
			$message->country=$data['country'];
			$message->province=$data['province'];
			$message->city=$data['city'];
			$message->area=$data['area'];
			$message->message_address=$data['message_address'];
			$message->message_photo=$this->upload($data['message_photo']);
			$message->private_photo=$this->upload($data['private_photo']);
			$message->message_idcard=$this->upload($data['message_idcard']);
			$message->message_fangcard=$this->upload($data['message_fangcard']);
			$message->message_jiacard=$this->upload($data['message_jiacard']);
			//print_r($message);die;
			$res=$message->save();
			if($res)
			{
				echo "<script>alert('添加成功');location.href='member_info'</script>";
			}
			else
			{
				echo "<script>alert('添加失败');location.href='member_info'</script>";
			}
		}
		else
		{
			//查询message
			$message=Message::where("user_id",'13')->first()->toArray();
			$country=Address::where('address_id',$message['country'])->first()->toArray();
			$province=Address::where('address_id',$message['province'])->first()->toArray();
			$city=Address::where('address_id',$message['city'])->first()->toArray();
			$area=Address::where('address_id',$message['area'])->first()->toArray();
			$message['message_address']=$country['address_name'].$province['address_name'].$city['address_name'].$area['address_name'].$message['message_address'];
			//print_r($message);die;
			//工资
			$salary=array('1000-5000','5000-10000','10000-15000','15000-20000','20000-30000','30000以上');
			//查询职业
			$arr=Job::get()->toArray();
			$data=$this->GetTree($arr,$pid=0);
			//查询地区表的顶级id	
			$address=Address::where('parent_id',0)->get()->toArray();
			//print_r($address);die;
			return view('MemberInfo/member_info',['data'=>$data,'address'=>$address,'message'=>$message,'salary'=>$salary]);
		}
	}
	/**
	 * 文件上传
	 */
	public function upload($file)
	{	    
		//文件是否上传成功
	    if($file->isValid()){	//判断文件是否上传成功
	        $originalName = $file->getClientOriginalName(); //源文件名

	        $ext = $file->getClientOriginalExtension();    //文件拓展名
 			
	        $type = $file->getClientMimeType(); //文件类型
			
	        $realPath = $file->getRealPath();   //临时文件的绝对路径
			
	        $fileName = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;  //新文件名
	        Storage::disk('uploads')->put($fileName,file_get_contents($realPath));   //传成功返回bool值
	        return $fileName;
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