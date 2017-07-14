<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface FollowRepository extends AbstractRepository
{
    public function listFollowsUser($id, $paginate);

    public function listByFollowsUser($id, $paginate);
    
    public function findelete($id);
    
    public function findFollow($user_id, $user_id_follow);
}
