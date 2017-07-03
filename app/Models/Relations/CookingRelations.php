<?php

namespace App\Models\Relations;

use App\Models\Comment;
use App\Models\Rate;
use App\Models\Category;

trait CookingRelations
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'comment_table');
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'rate_table');
    }

    public function categories()
    {
        return $this->belongstoMany(Category::class, 'cooking_categories');
    }
}
