<?php

namespace App\Repositories;
use App\Models\ProductImage;

class ProductImageRepository {

    public function all()
    {
        return ProductImage::all();
    }

    public function findById(int $id)
    {
        return ProductImage::findOrFail($id);
    }

    public function paginate(int $chunk)
    {
        return ProductImage::orderBy('id', 'desc')->simplePaginate($chunk);
    }

    public function create (array $data)
    {
        return ProductImage::create($data);
    }
}
