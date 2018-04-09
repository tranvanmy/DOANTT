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

    public function getByName($name)
    {
        $ingredient = $this->model->where('name', 'like', '%' . $name . '%')->where('status', '!=', 0)->get();

        return $ingredient;
    }

    public function checkName($name)
    {
        $ingredient = $this->model->where('name', $name)->first();

        return $ingredient;
    }
}
