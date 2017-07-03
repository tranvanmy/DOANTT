<?php

namespace App\Models\Relations;

use App\Models\Post;
use App\Models\Category;

trait PostCategoryRelations
{
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
