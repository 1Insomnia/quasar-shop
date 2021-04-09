<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LenseController extends Controller
{
    public function index ()
    {
        // Select all camears
        // SELECT * FROM products WHERE category_id = 1;
        $lenses = Product::where('category_id', 2)->get();
        return view('site.lenses')->with('lenses', $lenses);
    }
}
