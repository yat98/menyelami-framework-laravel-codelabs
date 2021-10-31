<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
	public function handle($request, Closure $next, ...$guards)
	{
		if ($this->auth->guest()) {
			if ($request->ajax()) {
				return response('Unauthorized', 401);
			}

			return redirect()->guest('login');
		}

		$nextRequest = $next($request);

		if ($request->user()->suspend) {
			$this->auth->logout();

			return redirect()->guest('login')
				->withErrors([
					'username' => 'This account is suspended',
				]);
		}

		$this->authenticate($request, $guards);

		return $nextRequest;
	}

	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return null|string
	 */
	protected function redirectTo($request)
	{
		if (!$request->expectsJson()) {
			return route('login');
		}
	}
}
