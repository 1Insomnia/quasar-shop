<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Product;

class ProductImageController extends Controller
{
    private string $product_image_directory = "assets/img/product/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $product_images = ProductImage::orderBy('id', 'desc')->simplePaginate(5);
        return view('admin.product_images.index')->with(['product_images' => $product_images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.product_images.create')->with(['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'product_id' => 'required|integer|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:10240',
        ];

        if ($this->validate($request, $rules)) {
            // Rename image and add timestamp
            $image_name = time() . "_" . $request->image->getClientOriginalName();
            // Move image to assets/img/product/ directory
            $request->image->move(public_path($this->product_image_directory), $image_name);
            // Create img path
            $image_full_path = $this->product_image_directory . $image_name;

            ProductImage::create([
                'product_id' => $request->product_id,
                'image_path' => $image_full_path,
            ]);
        }

        return redirect()->route('admin.product_images.index')->with('message', "Product Image : {$request->name} added.");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $product_image = ProductImage::findOrFail($id);
        return view('admin.product_images.show')->with(['product_image' => $product_image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $product_image = ProductImage::findOrFail($id);
        return view('admin.product_images.edit')->with(['product_image' => $product_image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $product_image = ProductImage::findOrFail($id);
        return redirect()->route('admin.product_images.index')->with('message', "Product Image : {$product_image->name} updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $product_image = ProductImage::findOrFail($id);
        $product_image->delete();
        return redirect()->route('admin.product_images.index')->with('messsage', "Product Image : {$product_image->name} deleted.");
    }
}
