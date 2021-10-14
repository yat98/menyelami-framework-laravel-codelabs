<?php

use App\Models\Quote;
use Illuminate\Http\Request;
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

Route::get('/motivasi', function () {
	return view('quote.motivasi')
		->with('penulis', 'Joni')
		->with('kalimat', 'Jatuh adalah cara maju yang rasanya tidak enak. Bangkit, move on! Jangan menyerah!');
});

Route::get('/inspirasi', function () {
	return view('quote.inspirasi');
});

Route::get('/new-quote', function () {
	return view('new-quote');
});

Route::get('/edit-quote/{id}', function ($id) {
	$quote = Quote::findOrFail($id);

	return view('edit-quote', compact('quote'));
});

Route::post('/quote', function () {
	dd(request()->all());
});
