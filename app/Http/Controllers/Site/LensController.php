<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;

class LensController extends Controller
{

    public function __invoke()
    {
        $lenses = Product::where(['category_id' => 2, 'status' => 1])->get();
        return view('site.lenses')->with('lenses', $lenses);
    }
}