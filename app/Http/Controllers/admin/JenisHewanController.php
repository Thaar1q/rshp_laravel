<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JenisHewan;

class JenisHewanController extends Controller {
    public function index() {
        $data = JenisHewan::all();
        return view('admin.jenis-hewan', compact('data'));
    }
}

