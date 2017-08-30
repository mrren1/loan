<?php

namespace App\Http\Controllers\fronted;

use App\Market;
use App\Http\Controllers\fronted\Controller;

class MarketController extends Controller
{
	public function index()
	{
		return view('fronted/market');
	}
}