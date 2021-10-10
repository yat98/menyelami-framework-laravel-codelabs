<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'length',
		'filename',
	];

	public function tags()
	{
		return $this->morphToMany(Tag::class, 'taggable');
	}
}
