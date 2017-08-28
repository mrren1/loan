<?php

namespace App\Http\Controllers;

use App\MemberInfo;
use App\Http\Controllers\Controller;
use App\Http\Models\Message;
use App\Http\Models\Job;

class MemberInfoController extends Controller
{
	public function index()
	{
		if($_POST)
		{
			echo 1;
		}
		else
		{
			//$res = new Message();
			// $arr=Message::where('user_id', 1)->first()->toArray();
			// print_r($arr);die;
			$arr=Job::get()->toArray();
			$data=$this->GetTree($arr,$pid=0);
			return view('member_info',['data'=>$data]);
		}
		
		return view('member_info');
	}
	public function GetTree($arr,$pid=0)
    {
        //定义数组
        $data=array();
        foreach($arr as $k => $v)
        {
            if($v['parent_id']==$pid)
            {
                $data[$k]=$v;
                $data[$k]['child']=$this->GetTree($arr,$v['job_id']);
            }
        }
        return $data;
    }
}