<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasRole
{
	/**
	 * Handle an incoming request.
	 *
	 * @param mixed $role
	 *
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next, $role)
	{
		if ($role == $request->user()->role) {
			return $next($request);
		}

		return redirect('home')
			->with('message', 'Anda tidak memiliki akses untuk halaman tersebut');
	}
}
