<?php

namespace App\Http\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Purse extends Model
{
	protected $table = 'purse';
	public $timestamps = false;
	/**
	 * 查询单条  查询钱包表
	 * @param $user_id
	 * @return  array
	 */
	public function GetAll($user_id)
	{
        return  DB::table("purse")->where('user_id','=',$user_id)->first();
	}
}
