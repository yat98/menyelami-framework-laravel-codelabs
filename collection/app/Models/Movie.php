<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'released_date',
		'studio_id',
	];

	public function studio()
	{
		return $this->belongsTo(Studio::class, 'studio_id');
	}
}
