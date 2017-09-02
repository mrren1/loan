<?php
namespace App\Http\Controllers\backend;
use App\Loan;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\DB;
class LoanController extends BackendController
{
     public function loan_list()
     {
     	 return view('backend/Loan/loan_list');
     }

}