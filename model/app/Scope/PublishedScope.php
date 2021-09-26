<?php

namespace App\Scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PublishedScope implements Scope
{
	public function apply(Builder $builder, Model $model)
	{
		$builder->where('published', 1);
	}

	public function remove(Builder $builder, Model $model)
	{
		$query = $builder->getQuery();
		foreach ((array) $query->wheres as $key => $where) {
			if ('Basic' == $where['type'] && 'published' == $where['column'] && 1 == $where['value']) {
				unset($query->wheres[$key]);
				$query->wheres = array_values($query->wheres);
				$bindings = $query->getRawBindings()['where'];
				unset($bindings[$key]);
				$query->setBindings($bindings);
			}
		}

		return $query;
	}
}
