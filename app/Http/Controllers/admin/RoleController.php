<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
  public function index()
  {
    $data = Role::all();
    return view('admin.role.index', compact('data'));
  }

  public function create()
  {
    return view('admin.role.create');
  }

  public function store(Request $r)
  {
    $this->validateRole($r);
    $this->createRole($this->formatNamaRole($r->nama_role));
    return back();
  }

  private function validateRole(Request $r)
  {
    $r->validate(['nama_role' => 'required|string|max:50']);
  }

  protected function createRole($nama)
  {
    Role::create(['nama_role' => $nama]);
  }

  protected function formatNamaRole($nama)
  {
    return ucwords(strtolower($nama));
  }

  public function edit(Role $role, Request $r)
  {
    $this->validateRole($r);
    $role->update(['nama_role' => $this->formatNamaRole($r->nama_role)]);
    return back();
  }

  public function delete(Role $role)
  {
    $role->delete();
    return back();
  }
}
