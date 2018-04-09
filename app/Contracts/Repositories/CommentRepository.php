<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface CommentRepository extends AbstractRepository
{
    public function getComments($id, $type);
}
