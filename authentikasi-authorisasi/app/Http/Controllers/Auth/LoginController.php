<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;
use Laravel\Socialite\Facades\Socialite;

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
			]);

			Auth::login($user, true);

			return redirect('home');
		} catch (InvalidArgumentException $e) {
			return abort(404, 'Driver tidak dikenal');
		} catch (ClientException $e) {
			return redirect('login');
		}
	}
}
