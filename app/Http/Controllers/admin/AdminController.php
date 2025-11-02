<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisHewan;
use App\Models\RasHewan;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use App\Models\KodeTindakanTerapi;
use App\Models\Pet;
use App\Models\Role;
use App\Models\User;

class AdminController extends Controller
{
  public function dashboard()
  {
    return view('admin.dashboard');
  }

  public function jenisHewan()
  {
    $data = JenisHewan::all();
    return view('admin.jenis-hewan', compact('data'));
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

  public function pet()
  {
    $data = Pet::with(['pemilik.user', 'rasHewan.jenisHewan'])->get();
    return view('admin.pet', compact('data'));
  }

  public function role()
  {
    $data = Role::all();
    return view('admin.role', compact('data'));
  }

  public function user()
  {
    $data = User::select('user.*', 'role.nama_role')
      ->leftJoin('role_user', 'user.iduser', '=', 'role_user.iduser')
      ->leftJoin('role', 'role_user.idrole', '=', 'role.idrole')
      ->get();
    return view('admin.user', compact('data'));
  }
}
