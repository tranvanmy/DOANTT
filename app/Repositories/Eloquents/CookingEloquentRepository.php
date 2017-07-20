<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\CookingRepository;
use App\Models\Cooking;
use App\Models\CookingCategory;
use App\Models\CookingIngredient;
use App\Models\CookingStep;
use App\Models\Category;
use DB;

class CookingEloquentRepository extends AbstractEloquentRepository implements CookingRepository
{
    public $model;

    public function __construct(Cooking $cooking)
    {
        $this->model = $cooking;
    }

    public function getCooking($id)
    {
        return $this->model->find($id);
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

    public function takeListCookingStatus($id, $paginate)
    {
        $cooking = $this->model
            ->with(['level'])
            ->orderBy('id', 'DESC')
            ->where('status', 1)
            ->where('user_id', $id)
            ->paginate($paginate);

        return $cooking;
    }

    public function getCookingCreating($user)
    {
        $cooking = $this->model->where('user_id', $user)
            ->where('status', 2)
            ->with(['steps', 'cookingIngredients.unit', 'categories'])
            ->with(['cookingIngredients.ingredient'])
            ->first();

        return $cooking;
    }

    public function storeCookingCategories($cooking_id, $data)
    {
        $cooking = $this->model->find($cooking_id);
        if ($cooking->categories()->sync($data)) {
            $cooking->update(['status' => '0']);
            return 1;
        }

        return 0;
    }

    public function deleteCoking($id)
    {
        DB::beginTransaction();
        try {
            CookingCategory::where('cooking_id', $id)->delete();
            CookingIngredient::where('cooking_id', $id)->delete();
            CookingStep::where('cooking_id', $id)->delete();
            Cooking::destroy($id);
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollback();

            return false;
        }
    }
}
