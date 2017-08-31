<?php
namespace App\Http\Controllers\backend;
use App\Purse;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
class PurseController extends Controller
{
     public function purse_list()
     {
     	 return view('backend/Purse/purse_list');
     }
}