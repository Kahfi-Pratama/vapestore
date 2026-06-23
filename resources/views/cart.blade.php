@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Keranjang Belanja
</h2>

@php
$total = 0;
@endphp

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    @forelse(session('cart', []) as $item)

        @php
            $subtotal = $item['price'] * $item['qty'];
            $total += $subtotal;
        @endphp

        <tr>

            <td>{{ $item['name'] }}</td>

            <td>
                Rp {{ number_format($item['price']) }}
            </td>

            <td>
                {{ $item['qty'] }}
            </td>

            <td>
                Rp {{ number_format($subtotal) }}
            </td>

            <td>
                <a href="/cart/remove/{{ $item['id'] }}"
                   class="btn btn-danger btn-sm">

                    Hapus

                </a>
            </td>

        </tr>

    @empty

        <tr>
            <td colspan="5" class="text-center">
                Keranjang masih kosong
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

<h4>
    Total:
    Rp {{ number_format($total) }}
</h4>


<a href="/cart/checkout"
   class="btn btn-success">

    Checkout Semua

</a>

@endsection