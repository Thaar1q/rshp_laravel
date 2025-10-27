<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class IsResepsionis
{
    public function handle($request, Closure $next)
    {
        if (Session::get('role') !== 'Resepsionis') {
            abort(403, 'Akses ditolak — hanya Resepsionis.');
        }
        return $next($request);
    }
}
