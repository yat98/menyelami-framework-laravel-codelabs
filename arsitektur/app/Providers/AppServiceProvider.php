<?php

namespace App\Providers;

use App\Entity\CreditCard;
use App\Entity\PaymentMethod;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register()
	{
		// Binding Interface
		$this->app->bind(PaymentMethod::class, CreditCard::class);
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot()
	{
	}
}
