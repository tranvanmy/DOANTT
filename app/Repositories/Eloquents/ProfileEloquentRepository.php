<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\ProfileRepository;
use App\Models\User;
use App\Models\Level;
use App\Models\Order;
use App\Models\Post;
use App\Models\Rate;
use App\Models\Follow;
use App\Models\Cooking;
use App\Models\Comment;

class ProfileEloquentRepository extends AbstractEloquentRepository implements ProfileRepository
{
    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function total($id, $with = null)
    {
        $users = $this->make($with)->where('id', $id)->first();
        return $users->posts()->count();
    }

    public function totalCooking($id, $with = null)
    {
        $users = $this->make($with)->where('id', $id)->first();
        return $users->cookings()->count();
    }

    public function takePost($id, $with = null)
    {
        $users = $this->model->with([])->where('id', $id)->first();

        return $users;
    }

    public function takeCooking($id, $with = null)
    {
        $users = $this->model->with(['cookings' => function ($query) {
            $query->with('level')->orderBy('rate_point', 'DESC')->take('3');
        }])->where('id', $id)->first();

        return $users;
    }

    public function takefollows($id, $with = null)
    {
        $follow = $this->model->with([])->where('id', $id)->first();

        return $follow;
    }

    public function takeByFollows($id, $with = null)
    {
        $follow = $this->model->with([])->where('id', $id)->first();

        return $follow;
    }

    public function takeAll($id)
    {
        $users = $this->model->with(['cookings' => function ($query) {
            $query->with('level')->orderBy('rate_point', 'DESC')->take('3');
        }, 'follows.userFollow' => function ($query) {
            $query->orderBy('id', 'DESC')->take('3');
        },'followBys.user' => function ($query) {
            $query->orderBy('id', 'DESC')->take('3');
        }, 'posts' => function ($query) {
            $query->orderBy('id', 'DESC')->take('3');
        }])->where('id', $id)->first();

        return $users;
    }

    public function takeMaster($paginate, $with = [], $select = null)
    {
        $post = $this->model->with(['level' => function ($query) {
            $query->orderBy('id', 'DESC');
        }])->paginate($paginate);
 
        return $post;
    }
}
