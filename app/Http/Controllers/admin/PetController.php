<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller {
    public function index() {
        $data = Pet::with(['pemilik.user','rasHewan.jenisHewan'])->get();
        return view('admin.pet', compact('data'));
    }
}
