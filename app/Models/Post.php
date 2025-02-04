<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'meta_title',
        'meta_description',
        'category_id'
    ];

    // Each post belongs to a category.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
