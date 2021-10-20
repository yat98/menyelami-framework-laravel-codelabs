<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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
	$request = app('Illuminate\Http\Request');
	dump($request->method());
	dd($request);
});

Route::get('/contact/about', function () {
	$request = app('Illuminate\Http\Request');

	return $request->path();
});

Route::get('home', [HomeController::class, 'index']);
Route::post('home', [HomeController::class, 'index']);

Route::get('registrasi', function () {
	return View::make('registrasi');
});
Route::post('registrasi', [HomeController::class, 'registrasi']);

Route::get('upload-form', function () {
	return View::make('upload-form');
});
Route::post('upload-profile-picture', [HomeController::class, 'uploadProfilePicture']);

Route::get('generate-cookie', [HomeController::class, 'generateCookie']);
Route::get('test-cookie', [HomeController::class, 'testCookie']);

Route::get('/post/memahami-laravel', function () {
	$request = app('Illuminate\Http\Request');
	dump($request->root());
	dump($request->url());
	dump($request->fullUrl());
	dump($request->path());
	dump($request->is('post/*'));

	return $request->method();
});

Route::get('custom-header', function () {
	return response('Berhasil membuat custom header', 404)
		->header('Made-By', '@hdytchndra');
});

Route::get('buku', function () {
	return redirect('https://leanpub.com/u/rahmatawaludin');
});

Route::get('daftar-buku', function () {
	return response()->json([
		['judul' => 'Seminggu Belajar Laravel', 'url' => 'https://leanpub.com/seminggubelajarlaravel'],
		['judul' => 'Menyelami Framework Laravel', 'url' => 'https://leanpub.com/bukularavel'],
	]);
});

Route::get('daftar-penyanyi', function () {
	return response()->json([
		'error' => 'Hidayat bukan penyanyi',
	], 403);
});

Route::get('daftar-motivasi', function () {
	return response()->download(public_path() . '/img/motivasi.jpg');
});

Route::get('menguasai-go-lang', function () {
	return response()->jsonNotFound('Buku Go Belum Ditulis');
});
