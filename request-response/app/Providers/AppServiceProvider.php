<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register()
	{
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(ResponseFactory $factory)
	{
		$factory->macro('jsonNotFound', function ($value) use ($factory) {
			return $factory->make(json_encode([
				'error_message' => $value,
			], 404))
				->header('Content-Type', 'application/json');
		});
	}
}
