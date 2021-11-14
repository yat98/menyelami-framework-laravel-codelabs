<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index(Request $request)
	{
		$events = Event::all();
		$organizations = Organization::all();

		return view('home', compact('request', 'events', 'organizations'));
	}

	public function settings()
	{
		if (Gate::allows('be-organizer')) {
			return view('settings.organizer');
		}
		if (Gate::allows('be-participant')) {
			return view('settings.participant');
		}
	}

	public function premium()
	{
		$this->authorize('premium-access');

		return 'Halaman premium...';
	}

	public function editEvent($id)
	{
		$event = Event::findOrFail($id);
		$this->authorize('update', $event);

		return 'Anda sedang mengakses halaman edit event ' . $event->name;
	}

	public function joinEvent($id)
	{
		$event = Event::findOrFail($id);
		$this->authorize('join', $event);

		return 'Anda sedang mengakses halaman join event ' . $event->name;
	}

	public function editOrganization($id)
	{
		$organization = Organization::findOrFail($id);
		$this->authorize('update', $organization);

		return 'Anda sedang mengakses halaman edit organization ' . $organization->name;
	}
}
