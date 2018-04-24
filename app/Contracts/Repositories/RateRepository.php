<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface RateRepository extends AbstractRepository
{
    public function getRates($id, $type);

    public function getReceiptId($id);

    public function createRateByUser($idCooking, $pointCooking);
}
