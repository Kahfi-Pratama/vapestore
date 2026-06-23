<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'category' => $row[1],
            'description' => $row[2],
            'price' => $row[3],
            'image' => 'default.jpg'
        ]);
    }
}
