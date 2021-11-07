<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens;
	use HasFactory;
	use Notifiable;
	use CanResetPassword;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
		'name',
		'username',
		'email',
		'provider',
		'provider_id',
		'avatar',
		'role',
		'password',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'suspend' => 'boolean',
	];
}
