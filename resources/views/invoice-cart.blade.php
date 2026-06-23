@extends('layouts.app')

@section('content')

<h2>Invoice Pembelian</h2>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>

    @php
        $total = 0;
    @endphp

    @foreach(session('checkout_cart', []) as $item)

    @php
        $subtotal = $item['price'] * $item['qty'];
        $total += $subtotal;
    @endphp

    <tr>
        <td>{{ $item['name'] }}</td>
        <td>Rp {{ number_format($item['price']) }}</td>
        <td>{{ $item['qty'] }}</td>
        <td>Rp {{ number_format($subtotal) }}</td>
    </tr>

    @endforeach

    </tbody>

</table>

<h3>Total Bayar: Rp {{ number_format($total) }}</h3>

@endsection