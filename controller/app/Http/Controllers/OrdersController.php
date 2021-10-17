<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface as PsrLoggerInterface;

class OrdersController extends Controller
{
	protected $log;

	public function __construct(PsrLoggerInterface $log)
	{
		$this->log = $log;
	}

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
		$order = Order::create($request->all());
		$this->log->info('Order baru telah dibuat. ID : ' . $order->id);

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

	public function destroy(PsrLoggerInterface $log, $id)
	{
		Order::findOrFail($id)
			->delete();
		$log->info('Order baru telah dihapus. ID : ' . $id);

		return redirect()->route('orders.index');
	}
}
