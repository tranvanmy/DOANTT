<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface WishlishRepository extends AbstractRepository
{
    public function findWishlist($user_id, $cooking_id);

    public function listWish($id);
}
