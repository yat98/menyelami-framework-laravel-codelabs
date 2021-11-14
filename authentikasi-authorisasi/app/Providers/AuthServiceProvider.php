<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Organization;
use App\Policies\EventPolicy;
use App\Policies\OrganizationPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
		Event::class => EventPolicy::class,
		Organization::class => OrganizationPolicy::class,
	];

	/**
	 * Register any authentication / authorization services.
	 */
	public function boot()
	{
		$this->registerPolicies();

		Gate::define('be-organizer', function ($user) {
			return 'organizer' == $user->role;
		});

		Gate::define('be-participant', function ($user) {
			return 'participant' == $user->role;
		});

		Gate::define('premium-access', function ($user) {
			return 'platinum' == $user->membership || 'gold' == $user->membership;
		});
	}
}
