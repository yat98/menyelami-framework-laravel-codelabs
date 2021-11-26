<?php

namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
	public function boot()
	{
		Validator::extend('passcheck', function ($attribute, $value, $parameters) {
			return Hash::check($value, $parameters[0]);
		});
	}
}
