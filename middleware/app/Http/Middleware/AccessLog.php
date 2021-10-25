<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccessLog
{
	/**
	 * Handle an incoming request.
	 *
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{
		$response = $next($request);

		DB::table('access_logs')->insert([
			'path' => $request->path(),
			'ip' => $request->getClientIp(),
			'status' => 'success',
			'created_at' => new DateTime(),
			'updated_at' => new DateTime(),
		]);

		$request->merge(['isLogged' => 1]);

		return $response;
	}

	public function terminate($request, $response)
	{
		if (!$request->has('isLogged')) {
			DB::table('access_logs')->insert([
				'path' => $request->path(),
				'ip' => $request->getClientIp(),
				'status' => 'failed',
				'created_at' => new DateTime(),
				'updated_at' => new DateTime(),
			]);
		}
	}
}
