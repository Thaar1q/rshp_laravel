<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsPerawat
{
	public function handle($request, Closure $next)
	{
		if (!Auth::check() || !Auth::user()->hasActiveRole('perawat')) {
			abort(403, 'Akses ditolak — hanya Perawat.');
		}

		return $next($request);
	}
}
