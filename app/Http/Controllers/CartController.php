<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['qty']++;

        } else {

            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'qty' => 1
            ];

        }

        session()->put('cart', $cart);

        return redirect('/cart');
    }

    public function index()
    {
        return view('cart');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);

        }

        return redirect('/cart');
    }

    public function checkout()
    {
        return view('cart-checkout');
    }

    public function checkoutStore(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {

            return redirect('/cart')
                ->with(
                    'error',
                    'Keranjang masih kosong'
                );

        }

        $total = 0;

        foreach ($cart as $item) {

            $total +=
                $item['price'] *
                $item['qty'];

        }

        $order = Order::create([

            'customer_name' => $request->customer_name,

            'phone' => $request->phone,

            'address' => $request->address,

            'product_id' => 0,

            'qty' => count($cart),

            'total_price' => $total

        ]);

        session()->put(
            'invoice_cart',
            $cart
        );

        session()->forget('cart');

        return redirect(
            '/cart/invoice/' . $order->id
        );
    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);

        $cart = session()->get(
            'invoice_cart',
            []
        );

        return view(
            'cart-invoice',
            compact(
                'order',
                'cart'
            )
        );
    }
}