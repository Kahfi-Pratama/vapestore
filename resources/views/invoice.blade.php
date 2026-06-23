@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Nota Pembelian
</h2>

<p>
    <strong>Nama:</strong>
    {{ $order->customer_name }}
</p>

<p>
    <strong>No HP:</strong>
    {{ $order->phone }}
</p>

<p>
    <strong>Alamat:</strong>
    {{ $order->address }}
</p>

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
        $grandTotal = 0;
    @endphp

    @foreach($cart as $item)

    @php
        $subtotal =
            $item['price'] *
            $item['qty'];

        $grandTotal += $subtotal;
    @endphp

    <tr>

        <td>{{ $item['name'] }}</td>

        <td>
            Rp {{ number_format($item['price']) }}
        </td>

        <td>{{ $item['qty'] }}</td>

        <td>
            Rp {{ number_format($subtotal) }}
        </td>

    </tr>

    @endforeach

    </tbody>

</table>

<h4>
    Total Bayar:
    Rp {{ number_format($grandTotal) }}
</h4>

@endsection