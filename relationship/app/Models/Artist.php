<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'genre',
	];

	public function albums()
	{
		return $this->hasMany(Album::class, 'album_id');
	}

	public function songs()
	{
		return $this->hasManyThrough(Song::class, Album::class);
	}
}
