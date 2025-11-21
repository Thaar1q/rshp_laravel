<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
	public function handle($request, Closure $next)
	{
		if (!Auth::check() || !Auth::user()->hasActiveRole('administrator')) {
			abort(403, 'Akses ditolak — hanya Administrator.');
		}

		return $next($request);
	}
}
