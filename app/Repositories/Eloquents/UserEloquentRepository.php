<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\UserRepository;
use App\Models\User;
use App\Models\Level;
use App\Models\Order;
use App\Models\Post;
use App\Models\Rate;
use App\Models\Follow;
use App\Models\Cooking;
use App\Models\Comment;

class UserEloquentRepository extends AbstractEloquentRepository implements UserRepository
{
    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function searchNamePaginateCooking($name, $paginate, $with = [], $select = null)
    {
        $user = User::where('name', 'like', '%' . $name . '%')
        ->with($with)
        ->orderBy('id', 'DESC')
        ->paginate($paginate);

        return $user;
    }

    public function searchStatusPaginateCooking($status, $paginate, $with = [], $select = null)
    {
        $user = User::where('status', $status)
        ->with($with)
        ->orderBy('id', 'DESC')
        ->paginate($paginate);

        return $user;
    }

    public function searchLevelPaginateCooking($level, $paginate, $with = [], $select = null)
    {
    	$user = User::where('level_id', $level)
        ->with($with)
        ->orderBy('id', 'DESC')
        ->paginate($paginate);

        return $user;
    }

    public function PaginateUser($paginate, $with = [], $select = null)
    {
        $user = User::with($with)
        ->orderBy('id', 'DESC')
        ->paginate($paginate);

        return $user;
    }

}
