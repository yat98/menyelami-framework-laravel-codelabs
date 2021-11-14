@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in! Hello, ') . Auth::user()->name . ', Email : ' . $request->user()->email . ', Role : ' . ucwords($request->user()->role) . ', Membership : ' . ucwords($request->user()->membership) }}
                        <div class="mt-3">
                            @can('be-organizer')
                                <a href="{{ url('event') }}" class="btn btn-info text-white">Event</a>
                            @endcan
                            @can('be-participant')
                                <a href="{{ url('event-history') }}" class="btn btn-info text-white">Event History</a>
                            @endcan
                        </div>
                        <div class="mt-5">
                            <h2>All Event</h2>
                            <hr>
                            @foreach ($events as $key => $event)
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3>{{ $event->name }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>{{ $event->description }}</p>
                                        <p>Tempat/Waktu: {{ $event->location }}, {{ $event->begin_date }} -
                                            {{ $event->finish_date }}</p>
                                        @can('be-organizer')
                                            <a href="{{ url('edit-event/' . $event->id) }}">Edit Event</a>
                                        @endcan
                                        @can('be-participant')
                                            <a href="{{ url('join-event/' . $event->id) }}">Join Event</a>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-5">
                            <h2>All Organizer</h2>
                            <hr>
                            @foreach ($organizations as $key => $organization)
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3>{{ $organization->name }}</h3>
                                    </div>
                                    <div class="card-body">
                                        @can('be-organizer')
                                            <a href="{{ url('edit-organization/' . $organization->id) }}">Edit
                                                Organization</a>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
