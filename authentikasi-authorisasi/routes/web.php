<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home', function () {
// 	return 'Anda berhasil login';
// })->name('home')
// 	->middleware('auth');

Route::get('/setting', function () {
	return 'Menampilkan halaman setting user';
})->middleware('auth');

Route::get('auth/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [LoginController::class, 'providerCallback']);

Route::get('event', function () {
	return 'berhasil mengakses halaman event';
})->middleware(['auth', 'role:organizer']);

Route::get('event-history', function () {
	return 'berhasil mengakses history event';
})->middleware(['auth', 'role:participant']);

Route::get('settings', [HomeController::class, 'settings'])
	->middleware('auth');

Route::get('premium', [HomeController::class, 'premium'])
	->middleware(['auth']);

Route::get('edit-event/{id}', [HomeController::class, 'editEvent']);

Route::get('join-event/{id}', [HomeController::class, 'joinEvent']);

Route::get('edit-organization/{id}', [HomeController::class, 'editOrganization']);

Route::group(['prefix' => 'api'], function () {
	Route::post('authenticate', [LoginController::class, 'getToken']);
	Route::get('users', function () {
		return User::all();
	})->middleware('jwt.auth');
});
