<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\PostCategoryRelations;


class PostCategory extends Model
{
    use PostCategoryRelations;

    protected $fillable = [
        'id',
        'post_id',
        'category_id',
    ];
}
