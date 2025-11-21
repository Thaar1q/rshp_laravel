<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsResepsionis
{
	public function handle($request, Closure $next)
	{
		if (!Auth::check() || !Auth::user()->hasActiveRole('resepsionis')) {
			abort(403, 'Akses ditolak — hanya Resepsionis.');
		}

		return $next($request);
	}
}
