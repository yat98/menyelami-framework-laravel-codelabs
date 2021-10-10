<?php

use App\Models\Movie;
use Illuminate\Support\Collection;
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

Route::get('create-collection', function () {
	$collection = new Collection();
	$collection->push('php');
	$collection->push('ruby');
	$collection->push('java');
	$collection->push(['nama' => 'Andy']);
	$collection->push(Movie::find(1));
	dump($collection);

	$newCollection = collect([1, 2, 3]);
	$newCollection->push('Bandung');
	$newCollection->put('ruby', 'ruby on rails');
	$newCollection->put('nodejs', 'express');
	$newCollection->put('php', 'laravel');
	$newCollection->put('java', 'spring boot');
	$newCollection->pop(1);
	dump($newCollection->all());

	$framework = $newCollection->pull('php');
	dump($framework);
	dump($newCollection->all());

	dump(Movie::all()->toJson());
	dump(Movie::all()->first());
	dump(Movie::all()->last());
	Movie::all()->each(function ($movie) {
		echo $movie->name . '<br>';
	});

	$m = Movie::all()->transform(function ($movie) {
		return 'Film ' . $movie->name;
	});
	dump($m->all());

	$film = Movie::all()->transform(function ($movie) {
		return 'Film ' . $movie->name;
	});
	dump($film->all());

	$pixar = Movie::all()->filter(function ($movie) {
		return 'Pixar' == $movie->studio->name;
	});
	dump($pixar->all());
});
