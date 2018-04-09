<?php

namespace App\Models\Relations;

use App\Models\Cooking;
use App\Models\Ingredient;
use App\Models\Unit;

trait CookingIngredientRelations
{
    public function cooking()
    {
        return $this->belongsTo(Cooking::class, 'cooking_id');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
