<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface FollowRepository extends AbstractRepository
{
    public function listFollowsUser($id, $paginate);

    public function listByFollowsUser($id, $paginate);
}
