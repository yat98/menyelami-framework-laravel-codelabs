@extends('layouts.master')

@section('content')
    <h1>Detail pesanan {{ $order->customer }}</h1>
    <table class="table table-condensed">
        <tr>
            <th>Tipe</th>
            <td>{{ $order->tipe }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $order->jumlah }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $order->alamat }}</td>
        </tr>
        <tr>
            <th>Tanggal Order</th>
            <td>{{ $order->created_at->format('M d, Y') }}</td>
        </tr>
    </table>
    <a href="{{ route('orders.index') }}">Kembali ke semua order</a>
@endsection
