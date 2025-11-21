<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsPemilik
{
	public function handle($request, Closure $next)
	{
		if (!Auth::check() || !Auth::user()->hasActiveRole('pemilik')) {
			abort(403, 'Akses ditolak — hanya Pemilik.');
		}

		return $next($request);
	}
}
