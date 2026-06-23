
@extends('layouts.app')

@section('content')

<h1 class="mb-4">
    Product Vape
</h1>

<div class="row">

@foreach($products as $product)

<div class="col-md-4 mb-4">

    <div class="card shadow h-100">

        <img
            src="{{ asset('uploads/'.$product->image) }}"
            class="card-img-top"
            style="height:250px; object-fit:cover;"
        >

        <div class="card-body">

            <h5>
                {{ $product->name }}
            </h5>

            <span class="badge bg-primary mb-2">
                {{ $product->category }}
            </span>

            <p>
                {{ $product->description }}
            </p>

            <h5>
                Rp {{ number_format($product->price) }}
            </h5>

          <div class="d-flex gap-2">

    <a href="/checkout/{{ $product->id }}"
       class="btn btn-success">
        Beli Sekarang
    </a>

    <a href="/cart/add/{{ $product->id }}"
       class="btn btn-primary">
        Tambah Keranjang
    </a>

</div>

        </div>

    </div>

</div>

@endforeach

</div>

@endsection
```
