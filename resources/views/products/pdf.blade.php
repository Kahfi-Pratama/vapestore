<!DOCTYPE html>
<html>
<head>
    <title>Laporan Produk</title>

    <style>

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        h2 {
            text-align: center;
        }

    </style>

</head>
<body>

<h2>Laporan Data Produk</h2>

<table>

    <thead>

        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
        </tr>

    </thead>

    <tbody>

        @foreach($products as $product)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $product->name }}
            </td>

            <td>
                {{ $product->category }}
            </td>

            <td>
                Rp {{ number_format($product->price) }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>
</html>