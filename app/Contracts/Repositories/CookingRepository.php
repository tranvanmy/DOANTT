<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface CookingRepository extends AbstractRepository
{
    public function getCooking($id);

    public function paginageCooking($paginate, $with = [], $select = null);

    public function takeListCooking($id, $paginate);

    public function takeListCookingStatus($id, $paginate);

    public function getCookingCreating($user);

    public function storeCookingCategories($cooking_id, $data);

    public function deleteCoking($id);
}
