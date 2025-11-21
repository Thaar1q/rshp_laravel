<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;

class OrganisasiController extends Controller
{
	public function index()
	{
		return view('site.organisasi');
	}
}
