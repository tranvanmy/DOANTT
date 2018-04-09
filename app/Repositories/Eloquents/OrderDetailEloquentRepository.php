<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\OrderDetailRepository;
use App\Models\OrderDetail;

class OrderDetailEloquentRepository extends AbstractEloquentRepository implements OrderDetailRepository
{
    public $model;

    public function __construct(OrderDetail $orderDetail)
    {
        $this->model = $orderDetail;
    }

    public function getByOrder($order_id, $with)
    {
        return $this->model->where('order_id', $order_id)->with($with)->get();
    }
}
