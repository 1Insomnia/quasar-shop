<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\GalleryPostRepository;
use Illuminate\Http\Request;

class GalleryPostController extends Controller
{

    private GalleryPostRepository $galleryPostRepository;

    public function __construct(GalleryPostRepository $galleryPostRepository)
    {
        $this->galleryPostRepository = $galleryPostRepository;
    }

    public function __invoke()
    {
        $gallery_posts = $this->galleryPostRepository->all();
        return view('site.gallery.index')
            ->with([
                'gallery_posts' => $gallery_posts,
            ]);
    }
}
