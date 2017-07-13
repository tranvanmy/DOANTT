<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface BlogRepository extends AbstractRepository
{
    public function paginagePost($paginate, $with = [], $select = null);

    public function takeListPost($id, $paginate);
}
