<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $products = Product::all();
        $product_categories = ProductCategory::all();
        $brands = Brand::all();
        $orders = Order::all();
        $users = User::all();

        return view('admin.index')
            ->with([
                'products' => $products,
                'product_categories' => $product_categories,
                'brands' => $brands,
                'orders' => $orders,
                'users' => $users,
            ]);
    }
}