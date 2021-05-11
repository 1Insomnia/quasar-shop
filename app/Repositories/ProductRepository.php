<?php

namespace App\Repositories;

use App\Models\Product;
use App\Traits\ImageUpload;

class ProductRepository extends BaseRepository

{
    use ImageUpload;

    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listProducts(string $order = 'id', string $sort = 'desc')
    {
        return $this->all($order, $sort);
    }

    public function paginateProducts(int $chunk)
    {
       return $this->model->simplePaginate($chunk);
    }

    public function createProduct(array $params)
    {
        return $this->create($params);
    }

    public function updateProduct(array $attributes, int $id)
    {
        return $this->update($attributes, $id);
    }

    public function deleteProduct(int $id)
    {
        $product = $this->find($id);

        if ($product) {
            $this->deleteImage($product->image_path);
        }

        return $product->delete();
    }
}