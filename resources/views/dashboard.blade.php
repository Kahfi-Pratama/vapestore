<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="text-end mb-3">
        <a href="/logout" class="btn btn-danger">
            Logout
        </a>
    </div>

    <h1 class="mb-4">
        Dashboard Admin
    </h1>

    <div class="mb-4">

        <a href="/products" class="btn btn-dark">
            Kelola Produk
        </a>

        <a href="/products/create" class="btn btn-success">
            Tambah Produk
        </a>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h5>Total Produk</h5>

                    <h1>{{ $totalProducts }}</h1>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h5>Total Nilai Produk</h5>

                    <h2>
                        Rp {{ number_format($totalValue) }}
                    </h2>

                </div>
                <div class="row mt-4">

    <div class="col-md-3">

        <div class="card bg-primary text-white">

            <div class="card-body">

                <h5>Disposable</h5>

                <h2>
                    {{ $disposableCount }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-success text-white">

            <div class="card-body">

                <h5>Pod</h5>

                <h2>
                    {{ $podCount }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-warning">

            <div class="card-body">

                <h5>Liquid</h5>

                <h2>
                    {{ $liquidCount }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-danger text-white">

            <div class="card-body">

                <h5>Aksesoris</h5>

                <h2>
                    {{ $aksesorisCount }}
                </h2>

            </div>

        </div>

    </div>

</div>

            </div>

        </div>

    </div>

   

    <!-- TABEL -->

    <div class="mt-5">

        <h3 class="mb-3">
            Produk Terbaru
        </h3>

        <table class="table table-bordered bg-white">

            <thead class="table-dark">

                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                </tr>

            </thead>

            <tbody>

                @forelse($latestProducts as $product)

                <tr>

                    <td width="120">

                        <img
                            src="{{ asset('uploads/'.$product->image) }}"
                            width="100"
                        >

                    </td>

                    <td>
                        {{ $product->name }}
                    </td>

                    <td>
                        Rp {{ number_format($product->price) }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3" class="text-center">

                        Belum ada produk

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>