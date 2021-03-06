<?php

namespace App\Models;

use App\Observer\ProductObserver;
use App\Scope\Published;
use App\Traits\PublishedTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
	use HasFactory;
	use SoftDeletes;
	use PublishedTraits;
	use Published;

	public $timestamps = false;

	// protected $hidden = [
	// 	'description',
	// 	'stock',
	// ];

	protected $visible = [
		'name',
		'price',
	];

	protected $casts = [
		'price' => 'double',
	];

	protected $dates = ['deleted_at'];

	public function scopeOverstock($query)
	{
		return $query->where('stock', '>', 30);
	}

	public function scopeOverprice($query)
	{
		return $query->where('price', '>', 4000000);
	}

	public function scopePremium($query)
	{
		return $query->overstock()->overprice();
	}

	public function scopeLevel($query, $parameter)
	{
		switch ($parameter) {
			case 'lux':
				return $query->where('price', '>', 5_000_000);

				break;
			case 'mid':
				return $query->whereBetween('price', [3_000_000, 5_000_000]);

				break;
			case 'entry':
				return $query->where('price', '<', 3_000_000);

				break;
			default:
				return $query;

				break;
		}
	}

	protected static function boot()
	{
		parent::boot();

		static::created(function ($model) {
			Log::info('Berhasil menambah ' . $model->name . ' Stok : ' . $model->stock);
		});

		static::observe(new ProductObserver());
	}
}
