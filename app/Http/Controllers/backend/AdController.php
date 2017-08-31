<?php
namespace App\Http\Controllers\backend;
use App\Ad;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
class AdController extends Controller
{

     public function ad_list()
     {
     	 return view('backend/Ad/ad_list');
     }
      public function ad_add()
     {
     	 return view('backend/Ad/ad_add');
     }
}