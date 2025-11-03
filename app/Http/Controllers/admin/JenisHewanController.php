<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    public function index()
    {
        $data = JenisHewan::all();
        return view('admin.jenis-hewan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.jenis-hewan.create');
    }

    public function store(Request $r)
    {
        $this->validateJenisHewan($r);
        $this->createJenisHewan($this->formatNamaJenisHewan($r->nama_jenis_hewan));
        return back();
    }

    private function validateJenisHewan(Request $r)
    {
        $r->validate(['nama_jenis_hewan' => 'required|string|max:100']);
    }

    protected function createJenisHewan($nama)
    {
        JenisHewan::create(['nama_jenis_hewan' => $nama]);
    }

    protected function formatNamaJenisHewan($nama)
    {
        return ucwords(strtolower($nama));
    }

    public function edit(JenisHewan $jenis, Request $r)
    {
        $this->validateJenisHewan($r);
        $jenis->update(['nama_jenis_hewan' => $this->formatNamaJenisHewan($r->nama_jenis_hewan)]);
        return back();
    }

    public function delete(JenisHewan $jenis)
    {
        $jenis->delete();
        return back();
    }
}
