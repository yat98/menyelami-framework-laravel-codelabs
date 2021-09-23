<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::get('list-stock', function () {
	$begin = memory_get_usage();
	foreach (DB::table('products')->get() as $product) {
		if ($product->stock > 20) {
			echo "{$product->name} : {$product->stock} <br>";
		}
	}
	echo 'Total memory usage : ' . (memory_get_usage() - $begin);
});

Route::get('list-stock-chunk', function () {
	$begin = memory_get_usage();
	DB::table('products')->orderBy('id')->chunk(100, function ($products) {
		foreach ($products as $product) {
			if ($product->stock > 20) {
				echo "{$product->name} : {$product->stock} <br>";
			}
		}
	});
	echo 'Total memory usage : ' . (memory_get_usage() - $begin);
});

Route::get('/order-product', function () {
	// Otomatis Transaksi
	// DB::transaction(function () {
	// 	// Tambah data order
	// 	$orderId = DB::table('orders')->insertGetId(['customer_id' => 1]);

	// 	// Tambah oder product
	// 	DB::table('orders_products')->insert(['order_id' => $orderId, 'product_id' => 5]);

	// 	// Update status bayar
	// 	DB::table('orders')->where('id', $orderId)->update(['paid_at' => new DateTime()]);

	// 	throw new Exception('Ooops.. ada error');
	// 	// Kurangi Stok
	// 	DB::table('products')->where('id', 5)->decrement('stock');
	// });

	// Manual Transaksi
	DB::beginTransaction();

	try {
		$orderId = DB::table('orders')->insertGetId(['customer_id' => 1]);
		DB::table('orders_products')->insert(['order_id' => $orderId, 'product_id' => 5]);

		// throw new Exception('Koneksi ke database terputus');
	} catch (Exception $e) {
		DB::commit();

		return 'Error : ' . $e->getMessage();
	}

	try {
		DB::table('orders_products')->insert(['order_id' => $orderId, 'product_id' => 5]);
		DB::table('products')->where('id', 5)->decrement('stock');

		throw new Exception('Server database mati');
	} catch (Exception $e) {
		DB::rollback();

		return 'Error : ' . $e->getMessage();
	}

	DB::commit();

	$product = DB::table('products')->find(5);
	echo 'Success sell product ' . $product->name . '<br>';
	echo 'Latest stock ' . $product->stock . '<br>';
});
