<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\FollowRepository;
use App\Models\User;
use App\Models\Follow;

class FollowEloquentRepository extends AbstractEloquentRepository implements FollowRepository
{
    public $model;

    public function __construct(Follow $follow)
    {
        $this->model = $follow;
    }

    public function listFollowsUser($id, $paginate)
    {
        $follow = $this->model->with(['userFollow'])
                       ->orderBy('id', 'DESC')->where('user_id', $id)->paginate($paginate);
        
        return $follow;
    }

    public function listByFollowsUser($id, $paginate)
    {
        $byFollow = $this->model->with(['user'])
                       ->orderBy('id', 'DESC')->where('user_id_follow', $id)->paginate($paginate);
        
        return $byFollow;
    }
}
