<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\PostRepository;
use App\Models\Post;

class PostEloquentRepository extends AbstractEloquentRepository implements PostRepository
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
}
