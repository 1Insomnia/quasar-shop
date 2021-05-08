<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CameraController extends Controller
{

    public function __invoke()
    {
        $cameras = Product::where('category_id', 1)->get();
        return view('site.cameras')->with('cameras', $cameras);
    }
}
