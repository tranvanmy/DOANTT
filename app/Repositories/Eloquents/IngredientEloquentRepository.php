<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\IngredientRepository;
use App\Models\Ingredient;

class IngredientEloquentRepository extends AbstractEloquentRepository implements IngredientRepository
{
    public $model;

    public function __construct(Ingredient $ingredient)
    {
        $this->model = $ingredient;
    }
}
