<?php
namespace App\Http\Controllers\backend;
use App\Loan;
use App\Http\Controllers\fronted\Controller;
use Illuminate\Support\Facades\DB;
class LoanController extends Controller
{
     public function loan_list()
     {
     	 return view('backend/Loan/loan_list');
     }

}