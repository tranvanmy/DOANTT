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

    public function searchNameAdmin($name);

    public function getPaginateCooking($paginate, $with = [], $select = null);

    public function searchNamePaginateCooking($name, $paginate, $with = [], $select = null);

    public function searchStatusPaginateCooking($status, $paginate, $with = [], $select = null);
}
