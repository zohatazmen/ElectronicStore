<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\Order;
use App\Models\frontend\OrderItem;
use App\Models\frontend\ShopModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $shop = ShopModel::find($request->shop_id);
        $quantity = $request->input('quantity', 1); // Default to 1 if quantity is not provided

        // Validate quantity
        if ($quantity <= 0) {
            return redirect()->back()->with('error', 'Invalid quantity!');
        }

        // Initialize cart if not already
        if (! session()->has('cart')) {
            session()->put('cart', []);
        }

        $cart = session()->get('cart');

        // Check if shop is already in cart
        if (isset($cart[$shop->id])) {
            $cart[$shop->id]['quantity'] += $quantity;
        } else {
            $cart[$shop->id] = [
                'name' => $shop->name,
                'price' => $shop->price,
                'quantity' => $quantity,
                'image' => $shop->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function index()
    {
        return view('frontend.cart');
    }

    public function remove(Request $request, $id)
    {
        // Get the cart from session
        $cart = session()->get('cart');

        // Check if the item exists in the cart
        if (isset($cart[$id])) {
            // Remove the item from the cart
            unset($cart[$id]);

            // Update the session cart
            session()->put('cart', $cart);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Item removed from cart!');
    }

    public function checkout(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'company' => 'nullable|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
        ]);

        // Create Order
        $order = Order::create([
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'address' => $request->address,
            'total_amount' => $this->calculateCartTotal(),
        ]);

        // Add Order Items
        foreach (session('cart', []) as $itemId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Cart has been emptied!');
    }

    private function calculateCartTotal()
    {
        $total = 0;
        foreach (session('cart', []) as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }
}