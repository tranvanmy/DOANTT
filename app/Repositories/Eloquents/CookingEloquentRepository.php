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
    public $cookingIngredient;

    public function __construct(Cooking $cooking, CookingIngredient $cookingIngredient)
    {
        $this->model = $cooking;
        $this->cookingIngredient = $cookingIngredient;
    }

    public function getCooking($id)
    {
        return $this->model->find($id);
    }

    public function paginageCooking($paginate, $with = [], $select = null)
    {
        $cooking = $this->model->with(['level'])->where('status', 1)->orderBy('id', 'DESC')->paginate($paginate);

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

    public function searchName($name)
    {
        return Cooking::where('name', 'like', '%' . $name . '%')
            ->with(['level'])
            ->where('status', 1)
            ->get();
    }

    public function searchNameAdmin($name)
    {
        return Cooking::where('name', 'like', '%' . $name . '%')
            ->with(['level'])
            ->paginate(10);
    }



    public function getPaginateCooking($paginate, $with = [], $select = null)
    {
        $cooking = $this->model->with($with)->orderBy('id', 'DESC')->paginate($paginate);

        return $cooking;
    }

    public function searchNamePaginateCooking($name, $paginate, $with = [], $select = null)
    {
        $cooking = Cooking::where('name', 'like', '%' . $name . '%')
        ->with($with)
        ->orderBy('id', 'DESC')
        ->paginate($paginate);

        return $cooking;
    }

    public function searchStatusPaginateCooking($status, $paginate, $with = [], $select = null)
    {
         $cooking = Cooking::where('status', $status)
        ->with($with)
        ->orderBy('id', 'DESC')
        ->paginate($paginate);

        return $cooking;
    }


    public function withArrId($arrId, $with)
    {
        return $this->model->whereIn('id', $arrId)->with($with)->get();
    }

    public function getByArrIngredient($ingredient = [], $with, $paginate)
    {
        $cookings = $this->cookingIngredient
            ->whereIn('ingredient_id', $ingredient)
            ->distinct(['cooking_id'])
            ->get(['cooking_id']);

        $cooking_id;
        foreach ($cookings as $cooking) {
            $cooking_id[] = $cooking->cooking_id;
        }

        return $this->model->with($with)->whereIn('id', $cooking_id)->paginate($paginate);
    }
}
