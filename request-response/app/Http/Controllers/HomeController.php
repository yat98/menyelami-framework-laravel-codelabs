<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
	public function index(Request $request)
	{
		$nama = $request->get('nama');
		$email = $request->get('email');
		dump($request->all());
		dump($request->only('nama'));
		dump($request->except('nama'));
		dump($request->has('alamat'));

		return "Halo {$nama}, Email Anda {$email}";
	}

	public function registrasi(Request $request)
	{
		if ('123' == $request->get('nomor_ktp')) {
			$request->flashOnly('nama', 'alamat');

			return redirect()->back();
		}

		return 'Berhasil Registrasi!';
	}

	public function uploadProfilePicture(Request $request)
	{
		if (!$request->hasFile('photo')) {
			return 'Tidak ada photo yang diupload';
		}

		$photo = $request->file('photo');
		$filename = Str::random(6) . '.' . $photo->getClientOriginalExtension();
		$path = public_path() . '/img';
		$photo->move($path, $filename);

		return 'Berhasil upload ' . $photo->getClientOriginalName() . ' ke ' . $path . ' dengan nama file ' . $filename;
	}

	public function generateCookie()
	{
		return response('halo')->withCookie(cookie('api_key', 's3cret', 10));
	}

	public function testCookie(Request $request)
	{
		if ($request->cookie('api_key')) {
			return 'Cookie api_key valid';
		}

		return 'Cookie api_key tidak valid';
	}
}
