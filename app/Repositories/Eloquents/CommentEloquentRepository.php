<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\CommentRepository;
use App\Models\Comment;

class CommentEloquentRepository extends AbstractEloquentRepository implements CommentRepository
{
    public $model;
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    public function getComments($id, $type)
    {
        return $this->model
            ->with(['sub.user', 'user'])
            ->where('comment_table_id', $id)
            ->where('comment_table_type', $type)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }
}
