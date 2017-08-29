<?php

namespace App\Http\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
class Log extends Model
{
	protected $table = 'user';

	public function Login($data)
	{ 
		 $user_name =$data['user_name'];
		 $user_pwd =$data['user_pwd'];
         $sql ="SELECT * FROM  user where user_name ='$user_name'";
         
         $users = DB::select($sql);
         // echo "<pre>";
         // var_dump($users);die;
     if($users)
         {
         $user =json_decode(json_encode($users), true);
         
         foreach ($user as $key => $value) 
         {
             $pwd =$value['user_pwd'];
             $user_id =$value['user_id'];
             $user_name =$value['user_name'];
         }
         $pwds = Crypt::decrypt($pwd);
         if($user_pwd==$pwds)
         {
             return $user_name;
         }
         else
         {
         	 return '2';
         }
     }
     else
     {
         return '3';
     }
    }
}
