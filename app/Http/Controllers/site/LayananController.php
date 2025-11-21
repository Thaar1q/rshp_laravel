<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;

class LayananController extends Controller
{
	public function index()
	{
		return view('site.layanan');
	}
}
