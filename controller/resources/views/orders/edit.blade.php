@extends('layouts.master')

@section('content')
    <h1>Ubah Order Untuk {{ $order->customer }}</h1>
    {{ Form::model($order, ['route' => ['orders.update', $order], 'method' => 'put']) }}
    @include('orders._form')
    {{ Form::close() }}
@endsection
