<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\GalleryPostRepository;
use Illuminate\Http\Request;

class GalleryPostController extends Controller
{
    /**
     * @var \App\Repositories\GalleryPostRepository
     */
    private GalleryPostRepository $galleryPostRepository;

    /**
     * GalleryPostController constructor.
     *
     * @param \App\Repositories\GalleryPostRepository $galleryPostRepository
     */
    public function __construct(GalleryPostRepository $galleryPostRepository)
    {
        $this->galleryPostRepository = $galleryPostRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $gallery_posts = $this->galleryPostRepository->all();
        return view('site.gallery.index')
            ->with([
                'gallery_posts' => $gallery_posts,
            ]);
    }
}