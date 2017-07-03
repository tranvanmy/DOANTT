<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\IngredientRelations;

class Ingredient extends Model
{
    use IngredientRelations;

    protected $fillable = [
        'id',
        'name',
        'description',
        'type',
        'image',
        'status',
    ];
}
