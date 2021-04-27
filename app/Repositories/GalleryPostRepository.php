<?php

namespace App\Repositories;

use App\Models\GalleryPost;

/**
 * Class GalleryPostRepository
 *
 * @package \App\Repositories
 */
class GalleryPostRepository
{
    public function __construct(GalleryPost $model)
    {
        $this->model = $model;
    }

    /**
     * @return \App\Models\GalleryPost[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param int $chunk
     *
     * @return mixed
     */
    public function paginate(int $chunk)
    {
        return $this->model->orderBy('id', 'desc')->simplePaginate($chunk);
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $array
     */
    public function store(array $array)
    {
        $this->model->create($array);
    }

    public function update(array $array)
    {
        $this->model->update($array);
    }

    /**
     * @param int $id
     */
    public function destroy(int $id)
    {
        $this->findById($id)->delete();
    }
}
