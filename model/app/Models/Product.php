<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use HasFactory;
	use SoftDeletes;

	public $timestamps = false;

	// protected $hidden = [
	// 	'description',
	// 	'stock',
	// ];

	protected $visible = [
		'name',
		'price',
	];

	protected $dates = ['deleted_at'];
}
