<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	use HasFactory;

	protected $appends = ['fullname'];

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}

	public function getFullnameAttribute()
	{
		return $this->firstname . ' ' . $this->lastname;
	}

	public function setBirthDateAttribute($value)
	{
		$this->attributes['birth_date'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
	}

	public function getBirthDateAttribute($value)
	{
		return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
	}

	public function getDates()
	{
		return ['created_at', 'updated_at', 'birth_date'];
	}
}
