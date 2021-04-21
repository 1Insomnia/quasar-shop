<?php

namespace App\Repositories;
use App\Models\Product;

class ProductRepository {

    public function paginate(int $chunk)
    {
        // Return all products ordered by id
        return Product::orderBy('id', 'desc')->simplePaginate($chunk);
    }
}
