<?php
namespace App\Http\Controllers\fronted;
use App\Http\Controllers\fronted\Controller;

class LargeController extends Controller
{
	public function index()
	{
		return view('fronted/Large/large');
	}
}