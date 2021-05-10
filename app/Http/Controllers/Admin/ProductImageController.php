<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\ProductImageRepository;


class ProductImageController extends Controller
{
    private string $product_image_directory = "assets/img/product/";
    private ProductImageRepository $productImageRepository;
    private \Illuminate\Database\Eloquent\Collection|array $products;
    use ImageUpload;


    public function __construct(ProductImageRepository $productImageRepository, ProductRepository $productRepository)
    {
        $this->productImageRepository = $productImageRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $product_images = $this->productImageRepository->paginate(5);
        return view('admin.product_images.index')->with(['product_images' => $product_images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $products = $this->productRepository->all();
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

        $request->validate($rules);

        $this->upload($request, $this->product_image_directory);
        $image_full_path = $this->getImageFullPath();

        $this->productImageRepository->create([
            'product_id' => $request->product_id,
            'image_path' => $image_full_path,
        ]);
        return redirect()->route('admin.product_images.index')->with('message', "Product Image added.");
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
        $product_image = $this->productImageRepository->findById($id);
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
        $products = $this->productRepository->all();
        $product_image = $this->productImageRepository->findById($id);
        return view('admin.product_images.edit')->with([
            'product_image' => $product_image,
            'products' => $products,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, int $id)
    {
        $product_image = $this->productImageRepository->findById($id);

        $rules = [
            'product_id' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:10240',
        ];

        $request->validate($rules);

        if (!empty($request->image)) {
            $this->upload($request, $this->product_image_directory);
            $image_full_path = $this->getImageFullPath();
        } else {
            $image_full_path = $product_image->image_path;
        }

        $product_image->update([
            'product_id' => $request->product_id,
            'image_path' => $image_full_path,
        ]);

        return redirect()->route('admin.product_images.index')->with('message', "Product Image of {$product_image->product->name} updated");
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
        $product_image = $this->productImageRepository->findById($id);
        $this->deleteImage($product_image->image_path);
        $product_image->delete();

        return redirect()->route('admin.product_images.index')->with('message', "Product Image of {$product_image->product->name} deleted.");
    }
}
