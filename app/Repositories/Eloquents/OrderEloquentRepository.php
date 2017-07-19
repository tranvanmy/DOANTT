<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\OrderRepository;
use App\Models\Order;

class OrderEloquentRepository extends AbstractEloquentRepository implements OrderRepository
{
    public $model;

    public function __construct(Order $order)
    {
        $this->model = $order;
    }
}
