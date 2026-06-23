@extends('layouts.app')

@section('content')

<h2>Checkout Produk</h2>

<form action="/checkout/store" method="POST">

    @csrf

    <input
        type="hidden"
        name="product_id"
        value="{{ $product->id }}"
    >

    <div class="mb-3">
        <label>Nama Pembeli</label>
        <input
            type="text"
            name="customer_name"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label>No HP</label>
        <input
            type="text"
            name="phone"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea
            name="address"
            class="form-control"
            required
        ></textarea>
    </div>

    <div class="mb-3">
        <label>Jumlah</label>
        <input
            type="number"
            name="qty"
            class="form-control"
            min="1"
            required
        >
    </div>

    <button
        type="submit"
        class="btn btn-success"
    >
        Checkout
    </button>

</form>

@endsection