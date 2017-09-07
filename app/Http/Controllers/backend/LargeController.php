<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Large;
class LargeController extends BackendController
{
     public function showList()
     {
     	//Large::
     	return view('backend/Large/largelist');
     }

}