<?php 
namespace App\Http\Controllers\backend;
use App\Platform;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\Platforms;

class  PlatformController extends BackendController
{
    /**
     * @access public
     * @param platform_list() 设置角色
     * @return  [description]
     */
    public function platform_list()
    {
    	$platform=new platforms;
    	$data =platforms::get()->toArray();
    	return view('backend/Platform/platform_list',['data'=>$data]);	
    }
}
?>
