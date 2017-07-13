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

    public function paginageCooking($paginate, $with = [], $select = null)
    {
        $cooking = $this->model->with(['level'])->orderBy('id', 'DESC')->paginate($paginate);
 
        return $cooking;
    }

    public function takeListCooking($id, $paginate)
    {
        $cooking = $this->model->with(['level'])->orderBy('id', 'DESC')->where('user_id', $id)->paginate($paginate);
        
        return $cooking;
    }
}
