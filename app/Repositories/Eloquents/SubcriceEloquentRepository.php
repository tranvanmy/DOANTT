<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\SubcriceRepository;
use App\Models\Subscrice;

class SubcriceEloquentRepository extends AbstractEloquentRepository implements SubcriceRepository
{
    public $model;

    public function __construct(Subscrice $subscrice)
    {
        $this->model = $subscrice;
    }
}
