<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RasHewan;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use App\Models\KodeTindakanTerapi;

class AdminController extends Controller
{
  public function dashboard()
  {
    return view('admin.dashboard');
  }

  public function rasHewan()
  {
    $data = RasHewan::with('jenisHewan')->get();
    return view('admin.ras-hewan', compact('data'));
  }

  public function kategori()
  {
    $data = Kategori::all();
    return view('admin.kategori', compact('data'));
  }

  public function kategoriKlinis()
  {
    $data = KategoriKlinis::all();
    return view('admin.kategori-klinis', compact('data'));
  }

  public function kodeTindakan()
  {
    $data = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
    return view('admin.kode-tindakan-terapi', compact('data'));
  }

}