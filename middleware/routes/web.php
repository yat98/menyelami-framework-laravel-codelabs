<?php

use App\Http\Controllers\HomeController;
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

// Route::group(['middleware' => ['api-token', 'access-log']], function () {
// 	Route::get('api-test', [HomeController::class, 'apiTest']);

// 	Route::get('log-test', [HomeController::class, 'logTest']);
// });

Route::get('admin-test', [HomeController::class, 'adminTest'])
	->middleware('api-token:admin');
Route::get('editor-test', [HomeController::class, 'editorTest'])
	->middleware('api-token:editor');

Route::get('posts/{post_id}', [HomeController::class, 'showPost'])
	->middleware('transform-resource:post');

Route::get('customers/{customer_id}', [HomeController::class, 'showCustomer'])
	->middleware('transform-resource:customer');
