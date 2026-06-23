@extends('layouts.app')

@section('content')

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h1>Daftar Produk</h1>

        <p class="text-muted mb-0">
            Total Produk: {{ $products->count() }}
        </p>

    </div>

    <div class="d-flex gap-2">

    <a href="/products/create" class="btn btn-dark">
        Tambah Produk
    </a>

    <a href="/products/export"
       class="btn btn-success">

        Export Excel

    </a>
     <a href="/products/pdf"
       class="btn btn-danger">
        Export PDF
    </a>

</div>

</div>

<form action="/products"
      method="GET"
      class="row g-2 mb-4">

    <div class="col-md-5">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari produk..."
            value="{{ request('search') }}"
        >

    </div>

    <div class="col-md-4">

        <select
            name="category"
            class="form-control"
        >

            <option value="">
                Semua Kategori
            </option>

            <option value="Disposable"
                {{ request('category') == 'Disposable' ? 'selected' : '' }}>
                Disposable
            </option>

            <option value="Pod"
                {{ request('category') == 'Pod' ? 'selected' : '' }}>
                Pod
            </option>

            <option value="Liquid"
                {{ request('category') == 'Liquid' ? 'selected' : '' }}>
                Liquid
            </option>

            <option value="Aksesoris"
                {{ request('category') == 'Aksesoris' ? 'selected' : '' }}>
                Aksesoris
            </option>

        </select>

    </div>

    <div class="col-md-3">

        <button class="btn btn-dark w-100">
            Filter
        </button>

    </div>

</form>

<div class="row">

    @if($products->count() > 0)

        @foreach($products as $product)

        <div class="col-md-4 mb-4">

            <div class="card shadow h-100">

                <img
                    src="/uploads/{{ $product->image }}"
                    class="card-img-top"
                    style="height:250px; object-fit:cover;"
                >

                <div class="card-body">

                    <h5>{{ $product->name }}</h5>

                    <span class="badge bg-primary mb-2">
                        {{ $product->category }}
                    </span>

                    <p>{{ $product->description }}</p>

                    <h6>
                        Rp {{ number_format($product->price) }}
                    </h6>

                    <div class="mt-3 d-flex gap-2">

                        <a
                            href="/products/{{ $product->id }}/edit"
                            class="btn btn-primary"
                        >
                            Edit
                        </a>

                        <form
                            action="/products/{{ $product->id }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    @else

        <div class="col-12">

            <div class="alert alert-warning">
                Produk tidak ditemukan
            </div>

        </div>

    @endif

</div>
</div>

<div class="d-flex justify-content-center mt-4">

    {{ $products->links() }}

</div>
@endsection