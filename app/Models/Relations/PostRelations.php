<?php

namespace App\Models\Relations;

use App\Models\Post;
use App\Models\User;
use App\Models\Rate;
use App\Models\Cooking;
use App\Models\Category;
use App\Models\Comment;

trait PostRelations
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'comment_table');
    }

    public function rates()
    {
        return $this->morphMany(Comment::class, 'rate_table');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongstoMany(Category::class, 'post_categories');
    }
}
