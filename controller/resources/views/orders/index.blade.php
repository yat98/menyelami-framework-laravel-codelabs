@extends('layouts.master')

@section('content')
    <h1>Domino Martabak - Order</h1>
    <table class="table table-hover table-striped">
        <thead>
            <th>Customer</th>
            <th>Jumlah</th>
            <th>Alamat</th>
            <th>Tanggal Order</th>
            <th> </th>
        </thead>
        <tbody>
            @foreach (App\Models\Order::all() as $order)
                <tr>
                    <td>
                        <a href="{{ route('orders.show', $order) }}">{{ $order->customer }}</a>
                    </td>
                    <td>{{ $order->tipe }}</td>
                    <td>{{ $order->jumlah }}</td>
                    <td>{{ $order->alamat }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order) }}">edit</a> |
                        {{ Form::open(['url' => route('orders.destroy', $order), 'method' => 'delete', 'class' => 'd-inline-block']) }}
                        {{ Form::submit('delete', ['class' => 'btn btn-sm btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
