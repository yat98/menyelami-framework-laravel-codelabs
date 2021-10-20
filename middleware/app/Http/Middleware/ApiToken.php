<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiToken
{
	/**
	 * Handle an incoming request.
	 *
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{
		if ($request->has('api_token')) {
			if ('indonesia-hebat' == $request->get('api_token')) {
				return $next($request);
			}

			return response('API Token Salah', 403);
		}

		return response('API Token Tidak Diisi', 403);
	}
}
