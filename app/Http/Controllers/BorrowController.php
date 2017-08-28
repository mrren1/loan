<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Http\Controllers\Controller;

class BorrowController extends Controller
{
	public function index()
	{
		return view('borrow');
	}
}