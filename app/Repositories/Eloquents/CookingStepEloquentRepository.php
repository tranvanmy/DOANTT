<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\CookingStepRepository;
use App\Models\Cooking;
use App\Models\CookingStep;


class CookingStepEloquentRepository extends AbstractEloquentRepository implements CookingStepRepository
{
    public $model;

    public function __construct(CookingStep $cookingStep)
    {
        $this->model = $cookingStep;
    }
}
