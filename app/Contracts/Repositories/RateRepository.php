<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface RateRepository extends AbstractRepository
{
    public function getRates($id, $type);
}
