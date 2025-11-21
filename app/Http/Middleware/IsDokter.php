<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsDokter
{
	public function handle($request, Closure $next)
	{
		if (!Auth::check() || !Auth::user()->hasActiveRole('dokter')) {
			abort(403, 'Akses ditolak — hanya Dokter.');
		}

		return $next($request);
	}
}
