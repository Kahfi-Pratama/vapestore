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
    Tambah Produk
</h1>

<form action="/products"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-3">

        <label>Nama Produk</label>

        <input type="text"
               name="name"
               class="form-control">

               <div class="mb-3">
    <label>Kategori</label>

    <input
        type="text"
        name="category"
        class="form-control"
        required
    >
</div>

    </div>

    <div class="mb-3">

        <label>Deskripsi</label>

        <textarea name="description"
                  class="form-control"></textarea>

    </div>

    <div class="mb-3">

        <label>Harga</label>

        <input type="number"
               name="price"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Upload Gambar</label>

<input type="file"
       name="image"
       class="form-control">

    </div>

    <button class="btn btn-dark">
        Simpan
    </button>

</form>

@endsection