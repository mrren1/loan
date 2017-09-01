<?php
namespace App\Http\Controllers\fronted;

use App\Help;
use App\Http\Controllers\fronted\Controller;

class HelpController extends Controller
{
	public function index()
	{
		return view('fronted.help');
	}
}