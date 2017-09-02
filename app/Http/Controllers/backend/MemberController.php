<?php
namespace App\Http\Controllers\backend;
use App\Member;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\DB;
class MemberController extends BackendController
{
     public function member_list()
     {
     	 return view('backend/Member/member_list');
     }
      public function member_sign()
     {
     	 return view('backend/Member/member_scoreoperation');
     }
      public function sign_add()
     {
     	 return view('backend/Member/sign_add');
     }
}