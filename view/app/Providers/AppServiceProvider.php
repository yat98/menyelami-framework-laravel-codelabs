<?php

namespace App\Providers;

use App\Http\ViewComposer\AppNameComposer;
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
		// View::share(['app_name' => 'Quote App V2.0'], ['quote.motivasi', 'quote.inspirasi']);

		// View::composer(['quote.motivasi', 'quote.inspirasi'], AppNameComposer::class);
		View::composer('*', AppNameComposer::class);
	}
}
