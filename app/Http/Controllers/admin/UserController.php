<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $data = User::select('user.*','role.nama_role')
            ->leftJoin('role_user','user.iduser','=','role_user.iduser')
            ->leftJoin('role','role_user.idrole','=','role.idrole')
            ->get();
        return view('admin.user', compact('data'));
    }
}