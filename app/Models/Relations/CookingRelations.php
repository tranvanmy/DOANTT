<?php

namespace App\Models\Relations;

use App\Models\Comment;
use App\Models\Rate;
use App\Models\User;
use App\Models\Level;
use App\Models\Category;
use App\Models\CookingIngredient;
use App\Models\CookingStep;
use App\Models\Wishlish;

trait CookingRelations
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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

    public function cookingIngredients()
    {
        return $this->hasMany(CookingIngredient::class, 'cooking_id');
    }

    public function steps()
    {
        return $this->hasMany(CookingStep::class, 'cooking_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlish::class, 'cooking_id');
    }
}
