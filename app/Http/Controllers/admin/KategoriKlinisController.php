<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriKlinis;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $data = KategoriKlinis::all();
        return view('admin.kategori-klinis.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori-klinis.create');
    }

    public function store(Request $r)
    {
        $this->validateKategoriKlinis($r);
        $this->createKategoriKlinis($r->nama_kategori_klinis);
        return back();
    }

    private function validateKategoriKlinis(Request $r)
    {
        $r->validate(['nama_kategori_klinis' => 'required|string|max:100']);
    }

    protected function createKategoriKlinis($nama)
    {
        KategoriKlinis::create(['nama_kategori_klinis' => $this->formatNamaKategoriKlinis($nama)]);
    }

    protected function formatNamaKategoriKlinis($nama)
    {
        return ucwords(strtolower($nama));
    }

    public function edit(KategoriKlinis $kategori, Request $r)
    {
        $this->validateKategoriKlinis($r);
        $kategori->update(['nama_kategori_klinis' => $this->formatNamaKategoriKlinis($r->nama_kategori_klinis)]);
        return back();
    }

    public function delete(KategoriKlinis $kategori)
    {
        $kategori->delete();
        return back();
    }
}
