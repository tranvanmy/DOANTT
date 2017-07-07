<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Models\Category;

class CategoryEloquentRepository extends AbstractEloquentRepository implements CategoryRepository
{
    public $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function hasChild($id)
    {
        return $this->model->where('parent_id', $id)->count();
    }

    public function status($status)
    {
        return $this->model->status($status)->get();
    }
}