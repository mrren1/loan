<?php
namespace App\Http\Controllers\fronted;

use App\Test;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
set_time_limit(0);

class TestController extends Controller
{
	public function index()
	{
		$data = ['快','决','电','饭','锅','健','康','尽','价','答','复','减','肥','的','股','放','大','看','观','发','给','我','广','泛','地'];
		for($i=0;$i<10000;$i++){
			$name = $data[rand(0,24)].$data[rand(0,24)].rand(1,9999).$i;
			$arr[$i] = [
				'user_name' => $name,
				'user_pwd' => encrypt('123456'),
				'user_photo' => '2017-09-02-11-19-41-59aa234ddc0ab.jpg',
				'user_black' => 1,
				'last_time' => time(),
			];
		}
		//var_dump($arr);
		$info = DB::table('user')->insert($arr);
		if(!$info){
            echo '失败'; 
        }else{
            echo '成功';
        }


	}
}