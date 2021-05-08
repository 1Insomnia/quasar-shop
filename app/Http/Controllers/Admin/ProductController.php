<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

use App\Traits\ImageUpload;

class ProductController extends Controller
{
    use ImageUpload;

    private string $cameras_folder = "assets/img/cameras/";
    private string $lenses_folder = "assets/img/lenses/";
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->middleware('is_admin');
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->paginateProducts(10);
        return view('admin.products.index')
            ->with([
                'products' => $products
            ]);
    }

    public function create()
    {
        $categories = \App\Models\ProductCategory::all();
        $brands = \App\Models\Brand::all();

        return view('admin.products.create')->with([
            "categories" => $categories,
            "brands" => $brands,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5|max:80',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|integer',
            'brand' => 'required|integer',
            'status' => 'required|boolean',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:10240'
        ];

        $this->validate($request, $rules);

        // Check if cameras or lenses and assign according path
        if ($request->category === 1) {
            $image_folder = $this->cameras_folder;
        } else {
            $image_folder = $this->lenses_folder;
        }

        $this->upload($request, $image_folder);
        $image_full_path = $this->getImageFullPath();

        $this->productRepository->createProduct([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category,
                'brand_id' => $request->brand,
                'status' => $request->status,
                'description' => $request->description,
                'image_path' => $image_full_path
            ]
        );

        return redirect()->route('admin.products.index')->with('message', "Product created");
    }

    public function show(int $id)
    {
        $product = $this->productRepository->findOneOrFail($id);
        return view('admin.products.show')
            ->with(['product' => $product]);
    }


    public function edit(int $id)
    {
        $product = $this->productRepository->findOneOrFail($id);
        $categories = \App\Models\ProductCategory::all();
        $brands = \App\Models\Brand::all();
        return view('admin.products.edit')->with([
            'product' => $product,
            "categories" => $categories,
            "brands" => $brands,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $product = $this->productRepository->findOneOrFail($id);

        $rules = [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|integer',
            'brand' => 'required|integer',
            'status' => 'required|boolean',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:10240'
        ];

        $this->validate($request, $rules);

        if (!empty($request->image)) {

            $request->category === 1 ? $image_folder = $this->cameras_folder : $image_folder = $this->lenses_folder;

            $this->upload($request, $image_folder);
            $image_full_path = $this->getImageFullPath();

        } else {
            $image_full_path = $product->image_path;
        }

        $this->productRepository->updateProduct([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'status' => $request->status,
            'description' => $request->description,
            'image_path' => $image_full_path,
        ], $id);

        return redirect()->route('admin.products.index')->with('message', "Product updated successfully");
    }

    public function destroy(int $id)
    {
        $this->productRepository->deleteProduct($id);

        return redirect()->route('admin.products.index')->with('message', "Product deleted successfully");
    }
}
