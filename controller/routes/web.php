<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrdersController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('about', [HomeController::class, 'about'])
	->name('home.about');

// Impilicit Controller
// Route::controller('blogs', BlogController::class);

Route::resource('orders', OrdersController::class);
