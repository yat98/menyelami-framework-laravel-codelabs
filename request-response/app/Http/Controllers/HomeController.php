<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
