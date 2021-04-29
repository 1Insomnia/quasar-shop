<?php

namespace App\Traits;

use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\File;


trait ImageUpload
{
    private string $image_full_path;

    public function upload(Request $request, string $image_directory)
    {
        $image_name = time() . "_" . $request->image->getClientOriginalName();
        $request->image->move(public_path($image_directory), $image_name);
        $this->image_full_path = $image_directory . $image_name;
        return $this;
    }

    /**
     * delete
     *
     * @param  mixed $image_full_path
     * @return self
     */
    public function deleteImage(string $image_full_path){
        if (file_exists(public_path($image_full_path))) {
            File::delete(public_path($image_full_path));
        }
        return $this;
    }

    public function getImageFullPath()
    {
        return $this->image_full_path;
    }
}
