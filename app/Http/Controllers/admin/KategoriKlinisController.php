<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriKlinis;

class KategoriKlinisController extends Controller {
    public function index() {
        $data = KategoriKlinis::all();
        return view('admin.kategori-klinis', compact('data'));
    }
}
