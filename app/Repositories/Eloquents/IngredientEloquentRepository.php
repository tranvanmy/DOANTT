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

    public function searchNamePaginateInger($name, $paginate, $select = null)
    {
        $Inger = Ingredient::where('name', 'like', '%' . $name . '%')
        ->orderBy('id', 'DESC')
        ->paginate($paginate);

        return $Inger;
    }

    public function searchStatusPaginateInger($status, $paginate, $select = null)
    {
         $Inger = Ingredient::where('status', $status)
        ->orderBy('id', 'DESC')
        ->paginate($paginate);

        return $Inger;
    }
     public function searchStatusPaginateIngeredent($status, $paginate, $select = null)
    {
         $Inger = Ingredient::where('type', $status)
        ->orderBy('id', 'DESC')
        ->paginate($paginate);

        return $Inger;
    }
}
