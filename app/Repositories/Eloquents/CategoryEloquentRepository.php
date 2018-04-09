<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Models\Category;
use App\Models\Cooking;
use App\Models\CookingCategory;

class CategoryEloquentRepository extends AbstractEloquentRepository implements CategoryRepository
{
    public $model;

    public function __construct(Category $category, CookingCategory $cookingCategoy, Cooking $cooking)
    {
        $this->model = $category;
        $this->cookingCategoy = $cookingCategoy;
        $this->cooking = $cooking;
    }

    public function hasChild($id)
    {
        return $this->model->where('parent_id', $id)->count();
    }

    public function status($status)
    {
        return $this->model->status($status)->get();
    }

    public function getAll()
    {
        return $this->model->with(['subCategories'])->whereNull('parent_id')->get();
    }

    public function getCategory($id, $with = null, $paginate)
    {
        $categories;
        if ($childCategories = $this->model->where('parent_id', $id)->get()) {
            foreach ($childCategories as  $childCategory) {
                $categories[] = $childCategory->id;
            }
        }
        $categories[] = $id;

        $cookings = $this->cookingCategoy
            ->whereIn('category_id', $categories)
            ->distinct(['cooking_id'])
            ->get(['cooking_id']);

        $cooking_id = [];
        foreach ($cookings as $cooking) {
            $cooking_id[] = $cooking->cooking_id;
        }

        return $this->cooking->with($with)->where('status', 1)->whereIn('id', $cooking_id)->paginate($paginate);
    }
}
