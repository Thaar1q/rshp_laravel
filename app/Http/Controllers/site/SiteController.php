<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{
	public function index()
	{
		return view('site.home');
	}

}
