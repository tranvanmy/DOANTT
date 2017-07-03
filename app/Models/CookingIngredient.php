<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CookingIngredientRelations;

class CookingIngredient extends Model
{
    use CookingIngredientRelations;

    protected $fillable = [
        'id',
        'ingredient_id',
        'cooking_id',
        'unit_id',
        'quantity',
        'description',
    ];
}
