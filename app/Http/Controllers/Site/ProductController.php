<?php


namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    public function show(int $id)
    {
        $product = $this->productRepository->find($id);
        return view('site.product.show')
            ->with([
                'product' => $product
            ]);
    }
}