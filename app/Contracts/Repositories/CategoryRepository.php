<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface CategoryRepository extends AbstractRepository
{
    public function hasChild($id);
    public function status($status);
}