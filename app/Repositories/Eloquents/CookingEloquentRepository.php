<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\CookingRepository;
use App\Models\Cooking;
use App\Models\CookingCategory;
use App\Models\CookingIngredient;
use App\Models\CookingStep;

class CookingEloquentRepository extends AbstractEloquentRepository implements CookingRepository
{
    public $model;
    public function __construct(Cooking $cooking)
    {
        $this->model = $cooking;
    }
}
