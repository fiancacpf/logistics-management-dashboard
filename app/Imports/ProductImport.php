<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'category_id' => $row[1],
            'qtd' => $row[2],
            'warehouse_id' => $row[3],
        ]);
    }
}
