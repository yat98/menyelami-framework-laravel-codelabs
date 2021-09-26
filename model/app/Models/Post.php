<?php

namespace App\Models;

use App\Traits\PublishedTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use HasFactory;
	use PublishedTraits;

	protected $fillable = [
		'title',
		'content',
		'published',
	];
}
