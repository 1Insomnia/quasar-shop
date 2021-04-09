<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CameraController extends Controller
{
    public function index ()
    {
        // Select all camears
        // SELECT * FROM products WHERE category_id = 1;
        $cameras = Product::where('category_id', 1)->get();
        return view('site.cameras')->with('cameras', $cameras);
    }
}
