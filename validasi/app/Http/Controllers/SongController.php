<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
	public function create()
	{
		return view('songs.create');
	}

	// Default Request
	// public function store(Request $request)
	public function store(StoreSongRequest $request)
	{
		// Menggunakan Traits
		// $rules = [
		// 	'title' => 'required',
		// 	'artist' => 'required|in:Afgan,Iwan Fals|min:3',
		// 	'album' => 'sometimes|required|alpha_num',
		// ];

		// if ($request->album) {
		// 	$rules['track_no'] = 'required|integer|min:0';
		// }

		// $this->validate($request, $rules, [
		// 	'title.required' => 'Isi dengan judul lagu populer bro...',
		// 	'album.required' => 'Album dari lagu ini mesti diisi ya',
		// 	'track_no.required' => 'Nomor Tracknya diisi ya',
		// ]);

		// Menggunakan Instance Validator
		// $validator = Validator::make($request->all(), [
		// 	'title' => 'required',
		// 	'artist' => 'required|in:Afgan,Iwan Fals|min:3',
		// 	'album' => 'sometimes|required|alpha_num',
		// 	'person.*.name' => 'alpha_num',
		// ], [
		// 	'title.required' => 'Isi dengan judul lagu populer bro...',
		// 	'album.required' => 'Album dari lagu ini mesti diisi ya',
		// 	'track_no.required' => 'Nomor Tracknya diisi ya',
		// 	'person.*.name.alpha_num' => 'Nama Personil mesti valid',
		// ]);

		// $validator->sometimes('track_no', 'required|integer|min:0', function ($input) {
		// 	return !empty($input->album);
		// });

		// if ($validator->fails()) {
		// 	return redirect('songs/new')
		// 		->withInput()
		// 		->withErrors($validator);
		// }

		App::setlocale('id');

		return 'Lagu ' . $request->title . ' oleh ' . $request->artist . ' disimpan';
	}

	public function testAjax(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|alpha_num|min:5',
			'password' => 'passcheck:' . User::all()->first()->password,
		]);

		return 'All data valid';
	}
}
