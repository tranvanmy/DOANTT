<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface CookingRepository extends AbstractRepository
{
    public function paginageCooking($paginate, $with = [], $select = null);

    public function takeListCooking($id, $paginate);
}
