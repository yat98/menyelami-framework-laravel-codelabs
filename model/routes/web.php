<?php

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

Route::get('customer/{id}', function ($id) {
	try {
		return Customer::findOrFail($id);
	} catch (ModelNotFoundException $e) {
		return 'Ooops... Customer tidak ditemukan';
	}
});

Route::get('product/{id}', function ($id) {
	return Product::findOrFail($id);
});
