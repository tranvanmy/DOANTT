<?php

namespace App\Models\Relations;

use App\Models\CookingIngredient;

trait IngredientRelations
{
    public function cookingIngredients()
    {
        return $this->hasMany(CookingIngredient::class, 'ingredient_id');
    }
}
