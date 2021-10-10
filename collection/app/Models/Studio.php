<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
	];

	public function movies()
	{
		return $this->hasMany(Movie::class, 'studio_id');
	}
}
