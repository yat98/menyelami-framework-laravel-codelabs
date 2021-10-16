@extends('layouts.master')

@section('content')
    <h1>Order Baru</h1>
    {{ Form::open(['route' => 'orders.store']) }}
    @include('orders._form')
    {{ Form::close() }}
@endsection
