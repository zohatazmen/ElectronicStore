<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\Order;
use App\Models\frontend\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('backend.orders', compact('orders'));
    }

    public function create()
    {
        return view('backend.order-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'address' => 'required|string',
            'total_amount' => 'required|numeric',
        ]);

        Order::create($request->all());

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', $id)->get();

        return view('backend.order-show', compact('order', 'orderItems'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('backend.order-edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'address' => 'required|string',
            'total_amount' => 'required|numeric',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
