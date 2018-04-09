<?php

namespace App\Models\Relations;

use App\Models\CookingIngredient;

trait UnitRelations
{
    public function cookingIngredients()
    {
        return $this->hasMany(CookingIngredient::class, 'unit_id');
    }
}
