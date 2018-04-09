<?php

namespace App\Models\Relations;

use App\Models\Cooking;
use App\Models\Category;

trait CookingCategoryRelations
{
    public function cooking()
    {
        return $this->belongsTo(Cooking::class, 'cooking_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
