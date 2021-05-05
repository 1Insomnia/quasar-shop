<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private string $cameras_folder = "assets/img/cameras/";
    private string $lenses_folder = "assets/img/lenses/";
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->middleware('is_admin');
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $products = $this->productRepository->paginate(10);
        return view('admin.products.index')
            ->with([
                'products' => $products
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $products = Product::all();
        $categories = \App\Models\ProductCategory::all();
        $brands = \App\Models\Brand::all();

        return view('admin.products.create')->with([
            "products" => $products,
            "categories" => $categories,
            "brands" => $brands,
        ]);
    }

    /*
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $rules = [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|integer',
            'brand' => 'required|integer',
            'status' => 'required|boolean',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:10240'
        ];

        if ($this->validate($request, $rules)) {

            // Check if cameras or lenses and assign according path
            if ($request->category = 1) {
                $image_folder = $this->cameras_folder;
            } else {
                $image_folder = $this->lenses_folder;
            }

            // // Get Image Name
            $image_name = time() . $request->image->getClientOriginalName();
            // // Add timestamp
            $image_full_path = $image_folder . $image_name;
            // Move image to the according folder
            $request->image->move(public_path($image_folder), $image_name);

            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category,
                'brand_id' => $request->brand,
                'status' => $request->status,
                'description' => $request->description,
                'image_path' => $image_full_path
            ]);
        };
        return redirect()->route('admin.products.index')->with('message', "Product : {$request->name} added");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show')
            ->with(['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $product = Product::findOrFail($id);
        $categories = \App\Models\ProductCategory::all();
        $brands = \App\Models\Brand::all();
        return view('admin.products.edit')->with([
            'product' => $product,
            "categories" => $categories,
            "brands" => $brands,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function update(Request $request, int $id)
    {
        $product = Product::findOrfail($id);

        $rules = [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|integer',
            'brand' => 'required|integer',
            'status' => 'required|boolean',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:10240'
        ];

        if ($this->validate($request, $rules)) {

            if (!empty($request->image)) {
                // Check if cameras or lenses and assign according path
                if ($request->category = 1) {
                    $image_folder = $this->cameras_folder;
                } else {
                    $image_folder = $this->lenses_folder;
                }

                // // Get Image Name
                $image_name = time() . "_" . $request->image->getClientOriginalName();
                // // Add timestamp
                $image_full_path = $image_folder . $image_name;
                // Move image to the according folder
                $request->image->move(public_path($image_folder), $image_name);
            } else {
                $image_full_path = $product->image_path;
            }

            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category,
                'brand_id' => $request->brand,
                'status' => $request->status,
                'description' => $request->description,
                'image_path' => $image_full_path ? $image_full_path : $request->image,
            ]);
        }

        return redirect()->route('admin.products.index')->with('message', "Product : {$request->name} updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('message', "Product : {$product->name} Deleted");
    }
}
