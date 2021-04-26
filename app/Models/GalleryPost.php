<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'title',
        'description',
        'location',
        'author',
        'image_path'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
