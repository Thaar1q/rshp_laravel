<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class IsDokter
{
    public function handle($request, Closure $next)
    {
        if (Session::get('role') !== 'Dokter') {
            abort(403, 'Akses ditolak — hanya Dokter.');
        }
        return $next($request);
    }
}
