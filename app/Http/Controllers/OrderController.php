<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function checkout($id)   
    {
        $product = Product::findOrFail($id);

        return view('checkout', compact('product'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $total = $product->price * $request->qty;

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'product_id' => $product->id,
            'qty' => $request->qty,
            'total_price' => $total
        ]);

        return redirect('/invoice/' . $order->id);
    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);

        $product = Product::findOrFail($order->product_id);

        return view('invoice', compact('order', 'product'));
    }
}