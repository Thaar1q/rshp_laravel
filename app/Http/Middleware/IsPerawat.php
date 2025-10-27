<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class IsPerawat
{
    public function handle($request, Closure $next)
    {
        if (Session::get('role') !== 'Perawat') {
            abort(403, 'Akses ditolak — hanya Perawat.');
        }
        return $next($request);
    }
}
