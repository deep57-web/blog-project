<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'meta_title', 'meta_description'];

    // A category may have many posts.
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
