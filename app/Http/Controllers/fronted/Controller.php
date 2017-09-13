<?php

namespace App\Http\Controllers\fronted;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 封装方法添加金钱交易记录日志表
     * @access public
     * @param  $logstr:更改的金钱，如+190、-100;
     * @param  $logdesc:金钱变动的详情
     * @return NULL
     */
    public function insertLog($tableName, $logStr, $logDesc, $userId=null)
    {
        if($tableName == 'purselog'){
            $insertArr = array(
                'user_id'          => $userId,
                'purselog_num'     => $logStr,
                'purselog_desc'    => $logDesc,
                'purselog_time'    => time()
            );
        }else if($tableName == 'platformlog'){
            $insertArr = array(
                'platformlog_num'  => $logStr,
                'platformlog_desc' => $logDesc,
                'platformlog_time' => time()
            );
        }
        DB::table($tableName)->insert($insertArr);
    }
    
}
