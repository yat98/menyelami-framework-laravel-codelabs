<?php

namespace App\Providers;

use App\Entity\CreditCard;
use App\Entity\CreditPhone;
use App\Entity\Customer;
use App\Entity\PaymentMethod;
use App\Entity\Seller;
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
		// $creditPhone = new CreditPhone('0812-3333-4444', 12500);
		// $this->app->instance(PaymentMethod::class, $creditPhone);

		// Contextual Binding
		// $this->app->when(Customer::class)
		// 	->needs(PaymentMethod::class)
		// 	->give(CreditPhone::class);

		// $this->app->when(Seller::class)
		// 	->needs(PaymentMethod::class)
		// 	->give(CreditCard::class);

		// Singleton Binding
		$this->app->singleton(PaymentMethod::class, CreditCard::class);
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot()
	{
	}
}
