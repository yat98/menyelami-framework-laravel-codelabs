<?php

use App\Http\Controllers\HomeController;
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
