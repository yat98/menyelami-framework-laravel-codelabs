<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiToken
{
	/**
	 * Handle an incoming request.
	 *
	 * @param mixed $access
	 *
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next, $access)
	{
		if ($request->has('api_token')) {
			$validToken = DB::table('tokens')
				->where('key', $request->get('api_token'))
				->where('access', $access)
				->count();

			if ($validToken) {
				return $next($request);
			}

			return response('API Token Salah', 403);
		}

		return response('API Token Tidak Diisi', 403);
	}
}
