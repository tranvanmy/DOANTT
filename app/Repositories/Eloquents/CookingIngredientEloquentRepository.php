<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\CookingIngredientRepository;
use App\Models\CookingIngredient;

class CookingIngredientEloquentRepository extends AbstractEloquentRepository implements CookingIngredientRepository
{
    public $model;

    public function __construct(CookingIngredient $cookingIngredient)
    {
        $this->model = $cookingIngredient;
    }
}
