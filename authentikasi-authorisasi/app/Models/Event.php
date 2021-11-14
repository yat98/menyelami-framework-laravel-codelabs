<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	use HasFactory;

	protected $fillable = [
		'organizer_id',
		'name',
		'description',
		'location',
		'begin_date',
		'finish_date',
		'published',
	];

	protected $casts = [
		'published' => 'boolean',
	];
}
