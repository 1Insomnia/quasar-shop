<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CameraController extends Controller
{

    /**
     * __invoke
     *
     * @return void
     */
    public function __invoke()
    {
        // Get All Cameras with status === 1
        $cameras = Product::where(['category_id' => 1, 'status' => 1])->get();
        return view('site.cameras')->with('cameras', $cameras);
    }
}