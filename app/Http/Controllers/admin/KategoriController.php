<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('admin.kategori.index', compact('data'));
    }

    public function create() { return view('admin.kategori.create'); }

    public function store(Request $r)
    {
        $this->validateKategori($r);
        $this->createKategori($r->nama_kategori);
        return back();
    }

    private function validateKategori(Request $r)
    {
        $r->validate(['nama_kategori' => 'required|string|max:100']);
    }

    protected function createKategori($nama)
    {
        Kategori::create(['nama_kategori' => $this->formatNamaKategori($nama)]);
    }

    protected function formatNamaKategori($nama)
    {
        return ucwords(strtolower($nama));
    }

    public function edit(Kategori $kategori, Request $r)
    {
        $this->validateKategori($r);
        $kategori->update(['nama_kategori' => $this->formatNamaKategori($r->nama_kategori)]);
        return back();
    }

    public function delete(Kategori $kategori)
    {
        $kategori->delete();
        return back();
    }
}