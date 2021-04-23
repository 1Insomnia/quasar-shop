<?php

namespace App\Traits;

use Illuminate\Http\Request as Request;

trait ImageUpload
{
    private string $image_full_path;

    public function upload(Request $request, string $image_directory)
    {
        $image_name = time() . "_" . $request->image->getClientOriginalName();
        $request->image->move(public_path($image_directory), $image_name);
        $this->image_full_path = $image_directory . $image_name;
    }

    public function getImageFullPath()
    {
        return $this->image_full_path;
    }
}
