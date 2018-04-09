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
}
