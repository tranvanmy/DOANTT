<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Models\User;

class UserEloquentRepository extends AbstractEloquentRepository implements CategoryRepository
{
    public $model;

    public function __construct(User $user)
    {
        $this->model = $category;
    }
}
