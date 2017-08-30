<?php

namespace App\Http\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Put extends Model
{
	public $timestamps = false;
	protected $table = 'put';
	/**
	 * 查询单条  
	 * @param $user_id
	 * @return  array
	 */
	public function GetAll($user_id)
	{
        return  DB::table("put")->where('user_id','=',$user_id)->first();
	}
}
