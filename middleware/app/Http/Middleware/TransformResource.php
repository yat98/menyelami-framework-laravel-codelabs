<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TransformResource
{
	/**
	 * Handle an incoming request.
	 *
	 * @param mixed $resource
	 *
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next, $resource)
	{
		$resourceClass = '\App\\Models\\' . $resource;
		$resourceIdKey = $resource . '_id';
		$resourceId = $request->route()->parameters()[$resourceIdKey];

		try {
			$model = $resourceClass::findOrFail($resourceId);
			$request->merge([$resource => $model]);

			return $next($request);
		} catch (ModelNotFoundException $e) {
			return response()->json(['error' => $resource . '_not_found', 404]);
		}

		return $next($request);
	}
}
