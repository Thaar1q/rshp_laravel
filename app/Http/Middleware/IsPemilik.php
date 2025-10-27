<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class IsPemilik
{
    public function handle($request, Closure $next)
    {
        if (Session::get('role') !== 'Pemilik') {
            abort(403, 'Akses ditolak — hanya Pemilik.');
        }
        return $next($request);
    }
}
