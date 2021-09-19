<?php

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

// Route::match(['get', 'post'], 'contact', function () {
// 	$html = '<h1>Contact Page</h1>';
// 	if (isset($_REQUEST['message'])) {
// 		$html = 'Send message : ' . $_REQUEST['message'];
// 	}

// 	return $html;
// });

Route::any('contact', function () {
	$html = '<h1>Contact Page</h1>';
	$html .= 'The route method is ' . request()->method();
	if (request()->isMethod('delete')) {
		$html .= '<br> you delete the data';
	}

	return $html;
});

Route::get('welcome/{name}/{from}', function ($name, $from) {
	return 'Welcome ' . $name . ' from ' . $from . '. you are so great';
})->where('name', '[A-Za-z]+');
