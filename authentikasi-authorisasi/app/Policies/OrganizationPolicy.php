<?php

namespace App\Policies;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationPolicy
{
	use HandlesAuthorization;

	public function update(User $user, Organization $organization)
	{
		return $user->id == $organization->admin_id;
	}
}
