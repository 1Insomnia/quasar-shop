<?php

namespace App\Repositories;
use App\Models\GalleryPost;
use JetBrains\PhpStorm\Pure;

/**
 * Class GalleryPostRepository
 *
 * @package \App\Repositories
 */
class GalleryPostRepository
{
    private GalleryPost $model;

    /**
     * GalleryPostRepository constructor.
     */
    #[Pure] public function __construct()
    {
        $this->model = new GalleryPost();
    }

    /**
     * @return \App\Models\GalleryPost[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all ()
    {
        return $this->model->all();
    }

    public function paginate(int $chunk)
    {
        return $this->model->orderBy('id', 'desc')->simplePaginate($chunk);
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function store(array $array){
        $this->model->create($array);
    }

    public function destroy(int $id)
    {
        $this->findById($id)->delete();
    }
}
