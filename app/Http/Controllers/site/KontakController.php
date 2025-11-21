<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;

class KontakController extends Controller
{
	public function index()
	{
		return view('site.kontak');
	}
}
