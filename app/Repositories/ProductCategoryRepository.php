<?php

namespace App\Repositories;
use App\Models\ProductCategory;

/**
 * Class ProductCategoryRepository
 *
 * @package \App\Repositories
 */
class ProductCategoryRepository
{
    public function all(){
        return ProductCategory::orderby('id', 'desc')->get();
    }
}
