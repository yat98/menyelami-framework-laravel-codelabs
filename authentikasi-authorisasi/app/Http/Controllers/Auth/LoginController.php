<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	protected $maxAttempts = 3;
	protected $decayMinutes = 10;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function username()
	{
		return 'username';
	}

	public function redirectToProvider($provider)
	{
		try {
			return Socialite::driver($provider)->redirect();
		} catch (InvalidArgumentException $e) {
			return abort(404, 'Driver tidak dikenal');
		}
	}

	public function providerCallback($provider)
	{
		try {
			$account = Socialite::driver($provider)->user();
			$user = User::firstOrCreate([
				'provider' => $provider,
				'provider_id' => $account->id,
				'username' => $account->name,
				'name' => $account->name,
				'email' => $account->email,
				'avatar' => $account->avatar,
				'role' => 'participant',
				'membership' => 'silver',
			]);

			Auth::login($user, true);

			return redirect('home');
		} catch (InvalidArgumentException $e) {
			return abort(404, 'Driver tidak dikenal');
		} catch (ClientException $e) {
			return redirect('login');
		}
	}

	public function getToken(Request $request)
	{
		$credentials = $request->only('email', 'password');

		try {
			if (!$token = JWTAuth::attempt($credentials)) {
				return response()->json([
					'error' => 'invalid_credentials',
				], 401);
			}
		} catch (JWTException $e) {
			return response()->json(['error' => 'could_not_create_token'], 500);
		}

		return response()->json(compact('token'));
	}
}
