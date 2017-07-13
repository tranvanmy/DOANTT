<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\BlogRepository;
use App\Models\Post;
use App\Models\User;

class BlogEloquentRepository extends AbstractEloquentRepository implements BlogRepository
{
    public $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function paginagePost($paginate, $with = [], $select = null)
    {
        $post = $this->model->with(['user'])->orderBy('id', 'DESC')->paginate($paginate);
 
        return $post;
    }

    public function takeListPost($id, $paginate)
    {
        $post = $this->model->with(['user'])->orderBy('id', 'DESC')->where('user_id', $id)->paginate($paginate);
        
        return $post;
    }
}
