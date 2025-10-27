<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Session::get('role') !== 'Administrator') {
            abort(403, 'Akses ditolak — hanya Administrator.');
        }

        return $next($request);
    }
}
