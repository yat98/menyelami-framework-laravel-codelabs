<?php

namespace App\Observer;

use App\Models\ProductLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductObserver
{
	public function created($model)
	{
		Log::info('Berhasil menambahkan ' . $model->nama . ' Stock : ' . $model->stock . ' dibuat dari ProductObserver');
	}

	public function updating($model)
	{
		// Check jika product sudah ada di tabel order product maka return false
		// if (DB::table('orders_products')->where('product_id', $model->id)->count() > 0 && $model->isDirty('name')) {
		// 	return false;
		// }

		$changes = [];
		foreach ($model->getDirty() as $attribute => $new) {
			$original = $model->getOriginal($attribute);
			if ($new != $original) {
				$change = [
					'attribute' => $attribute,
					'from' => $original,
					'to' => $new,
				];
				$changes[] = $change;
			}
		}

		if (count($changes) > 0) {
			ProductLog::create([
				'product_id' => $model->id,
				'changes' => $changes,
			]);
		}

		return true;
	}
}
