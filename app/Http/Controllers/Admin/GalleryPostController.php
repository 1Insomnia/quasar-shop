<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\GalleryPostRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Traits\ImageUpload;

class GalleryPostController extends Controller
{
    use ImageUpload;

    private GalleryPostRepository $gallerPostRepository;
    /**
     * @var \App\Repositories\ProductRepository
     */
    private ProductRepository $productRepository;
    private string $product_image_directory = "assets/img/gallery/";

    public function __construct(GalleryPostRepository $galleryPostRepository, ProductRepository $productRepository)
    {
        $this->galleryPostRepository = $galleryPostRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $gallery_posts = $this->galleryPostRepository->paginate(5);
        return view('admin.gallery_posts.index')
            ->with(['gallery_posts' => $gallery_posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $products = $this->productRepository->all();
        return view('admin.gallery_posts.create')
            ->with([
                'products' => $products,
            ]);
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
            'product_id' => 'required|integer',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:10240',
            'author' => 'required|max:255',
            'location' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $this->upload($request, $this->product_image_directory);
        $image_full_path = $this->getImageFullPath();

        $this->galleryPostRepository->store([
            'product_id' => $request->product_id,
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'location' => $request->location,
            'image_path' => $image_full_path,
        ]);

        return redirect()->route('admin.gallery_posts.index')->with('message', "Gallery Post : {$request->title} added.");

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
        $gallery_post = $this->galleryPostRepository->findById($id);
        return view('admin.gallery_posts.show')
            ->with(['gallery_post' => $gallery_post]);
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
        $gallery_post = $this->galleryPostRepository->findById($id);
        $products = $this->productRepository->all();
        return view('admin.gallery_posts.edit')
            ->with([
                'gallery_post' => $gallery_post,
                'products' => $products,
            ]);
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
        return redirect()->route('admin.gallery_posts.index')->with('message', "Post Updated");
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
        $this->galleryPostRepository->destroy($id);
        return redirect()->route('admin.gallery_posts.index')->with('message', "Gallery Post : Deleted");
    }
}
