@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Checkout Semua Produk
</h2>

<form action="/cart/checkout/store" method="POST">

    @csrf

    <div class="mb-3">
        <label>Nama Customer</label>
        <input
            type="text"
            name="customer_name"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>No HP</label>
        <input
            type="text"
            name="phone"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea
            name="address"
            class="form-control"
            required></textarea>
    </div>

    <button
        type="submit"
        class="btn btn-primary">

        Pesan Sekarang

    </button>

</form>

@endsection