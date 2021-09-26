<?php

namespace App\Traits;

trait PublishedTraits
{
	public function scopeDraft($query)
	{
		return $query->where('published', '!=', 1);
	}

	public function scopePublished($query)
	{
		return $query->where('published', 1);
	}
}
