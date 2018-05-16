<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface PostRepository extends AbstractRepository
{
    public function paginagePost($paginate, $with = [], $select = null);
}
