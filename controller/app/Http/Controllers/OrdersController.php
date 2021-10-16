<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
	public function index()
	{
		return view('orders.index');
	}

	public function create()
	{
		return view('orders.create');
	}

	public function store(Request $request)
	{
		Order::create($request->all());

		return redirect()->route('orders.index');
	}

	public function show($id)
	{
		$order = Order::findOrFail($id);

		return view('orders.show', compact('order'));
	}

	public function edit($id)
	{
		$order = Order::findOrFail($id);

		return view('orders.edit', compact('order'));
	}

	public function update(Request $request, $id)
	{
		$order = Order::findOrFail($id);
		$order->update($request->all());

		return redirect()->route('orders.index');
	}

	public function destroy($id)
	{
		Order::findOrFail($id)
			->delete();

		return redirect()->route('orders.index');
	}
}
