<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\UnitRepository;
use App\Models\Unit;

class UnitEloquentRepository extends AbstractEloquentRepository implements UnitRepository
{
    public $model;

    public function __construct(Unit $unit)
    {
        $this->model = $unit;
    }
}
