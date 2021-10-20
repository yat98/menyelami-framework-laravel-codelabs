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
		$totalAccess = DB::table('access_logs')->where('path', $request->path())->count();

		return 'Halaman ini telah diakses sebanyak ' . $totalAccess . ' kali';
	}
}
