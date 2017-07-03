<?php 

namespace App\Models\Relations;

use App\Models\Category;
use App\Models\CookingCategory;
use App\Models\PostCategory;
use App\Models\Cooking;

trait CategoryRelations
{
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parentCategories()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function cookingCategories()
    {
        return $this->hasMany(CookingCategory::class, 'category_id');
    }

    public function cookings()
    {
        return $this->belongstoMany(Cooking::class, 'cooking_categories');
    }

    public function posts()
    {
        return $this->belongstoMany(Cooking::class, 'post_categories');
    }
    public function postCategories()
    {
        return $this->hasMany(PostCategory::class, 'category_id');
    }
}
