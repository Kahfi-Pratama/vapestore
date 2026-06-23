@extends('layouts.app')

@section('content')
@if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<h1 class="mb-4">
    Edit Produk
</h1>

<<form action="/products/{{ $product->id }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Nama Produk</label>

        <input type="text"
               name="name"
               class="form-control"
               value="{{ $product->name }}">

    </div>
<div class="mb-3">

    <label>Kategori</label>

    <select name="category" class="form-control">

        <option value="Disposable"
            {{ $product->category == 'Disposable' ? 'selected' : '' }}>
            Disposable
        </option>

        <option value="Pod"
            {{ $product->category == 'Pod' ? 'selected' : '' }}>
            Pod
        </option>

        <option value="Liquid"
            {{ $product->category == 'Liquid' ? 'selected' : '' }}>
            Liquid
        </option>

        <option value="Aksesoris"
            {{ $product->category == 'Aksesoris' ? 'selected' : '' }}>
            Aksesoris
        </option>

    </select>

</div>
    <div class="mb-3">

        <label>Deskripsi</label>

        <textarea name="description"
                  class="form-control">{{ $product->description }}</textarea>

    </div>

    <div class="mb-3">

        <label>Harga</label>

        <input type="number"
               name="price"
               class="form-control"
               value="{{ $product->price }}">

    </div>

    <div class="mb-3">

        <label>URL Gambar</label>

        <input type="file"
       name="image"
       class="form-control">

    </div>

    <button class="btn btn-primary">
        Update Produk
    </button>

</form>

@endsection