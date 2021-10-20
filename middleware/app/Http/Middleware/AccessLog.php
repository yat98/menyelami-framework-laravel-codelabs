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
			'created_at' => new DateTime(),
			'updated_at' => new DateTime(),
		]);

		return $response;
	}
}
