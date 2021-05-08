<?php

namespace App\Repositories;

use App\Models\GalleryPost;

class GalleryPostRepository
{
    public function __construct(GalleryPost $model)
    {
        $this->model = $model;
    }

    public function all()
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

    public function store(array $array)
    {
        $this->model->create($array);
    }

    public function update(array $array)
    {
        $this->model->update($array);
    }

    public function destroy(int $id)
    {
        $this->findById($id)->delete();
    }
}
