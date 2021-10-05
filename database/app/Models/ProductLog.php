<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLog extends Model
{
	use HasFactory;

	protected $fillable = [
		'product_id',
		'changes',
	];

	public function setChangesAttribute($value)
	{
		$this->attributes['changes'] = json_encode($value);
	}

	public function getChangesAttribute($value)
	{
		return json_decode($value);
	}
}
