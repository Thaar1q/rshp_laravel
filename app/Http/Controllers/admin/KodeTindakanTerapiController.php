<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;

class KodeTindakanTerapiController extends Controller {
    public function index() {
        $data = KodeTindakanTerapi::with(['kategori','kategoriKlinis'])->get();
        return view('admin.kode-tindakan-terapi', compact('data'));
    }
}
