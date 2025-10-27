<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\RasHewan;

class RasHewanController extends Controller {
    public function index() {
        $data = RasHewan::with('jenisHewan')->get();
        return view('admin.ras-hewan', compact('data'));
    }
}