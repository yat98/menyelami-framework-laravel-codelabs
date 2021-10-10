<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
		View::share(['app_name' => 'Quote App V2.0'], ['quote.motivasi', 'quote.inspirasi']);
	}
}
