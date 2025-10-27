<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller {
    public function index() {
        $data = Role::all();
        return view('admin.role', compact('data'));
    }
}