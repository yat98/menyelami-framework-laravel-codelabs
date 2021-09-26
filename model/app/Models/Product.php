<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	public $timestamps = false;

	// protected $hidden = [
	// 	'description',
	// 	'stock',
	// ];

	protected $visible = [
		'name',
		'price',
	];
}
