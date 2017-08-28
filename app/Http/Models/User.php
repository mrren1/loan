<?php

namespace App\Http\models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'user';

	public function addOne($data)
	{
		return DB::insert('insert into '.$this->table.' (user_id,user_name,user_pwd,user_photo,last_time) values (?,?,?,?,?)', [null,$data['user_name'],$data['user_pwd'],$data['user_photo'],$data['last_time']]);
	}
}
