<?php

namespace App\Scope;

trait Published
{
	public static function bootPublished()
	{
		static::addGlobalScope(new PublishedScope());
	}

    public static function withDrafts(){
        return (new static)->newQueryWithoutScope(PublishedScope::class);
    }
}
