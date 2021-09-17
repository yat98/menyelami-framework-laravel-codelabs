<?php

namespace App\Providers;

use App\Entity\CreditCard;
use App\Entity\CreditPhone;
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
		// $this->app->bind(PaymentMethod::class, CreditCard::class);

		// Binding Instance
		$creditPhone = new CreditPhone('0812-3333-4444', 12500);
		$this->app->instance(PaymentMethod::class, $creditPhone);
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot()
	{
	}
}
