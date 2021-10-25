<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function apiTest()
	{
		return 'Berhasil mengakses API';
	}

	public function logTest(Request $request)
	{
		$totalSuccess = DB::table('access_logs')
			->where('path', $request->path())
			->where('status', 'success')
			->count();
		$totalFailed = DB::table('access_logs')
			->where('path', $request->path())
			->where('status', 'failed')
			->count();

		return 'Halaman ini telah diakses sebanyak ' . $totalSuccess . ' kali sukses dan ' . $totalFailed . ' kali gagal';
	}

	public function adminTest()
	{
		return 'Berhasil berhasil mengakses resource admin';
	}

	public function editorTest()
	{
		return 'Berhasil berhasil mengakses resource editor';
	}
}
