<?php

namespace App\Http\Controllers;

use App\Market;
use App\Http\Controllers\Controller;

class MarketController extends Controller
{
	public function index()
	{
		return view('market');
	}
}