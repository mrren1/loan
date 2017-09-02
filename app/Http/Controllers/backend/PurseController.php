<?php
namespace App\Http\Controllers\backend;
use App\Purse;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\DB;
class PurseController extends BackendController
{
     public function purse_list()
     {
     	 return view('backend/Purse/purse_list');
     }
}