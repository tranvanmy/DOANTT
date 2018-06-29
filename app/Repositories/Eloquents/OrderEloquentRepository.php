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

    public function getByUser($id, $paginate, $with)
    {
        return $this->model->with($with)->where('user_id', $id)->orderBy('id', 'desc')->paginate($paginate);
    }

    public function get($paginate, $with)
    {
        return $this->model->with($with)->orderBy('id', 'desc')->paginate($paginate);
    }

     public function firstByIdOrder($with, $id)
    {
        return $this->model->with($with)->where('id', $id)->first();
    }

    public function getWithSeller($paginate, $seller_id, $with)
    {
        return $this->model->with($with)->where('seller', $seller_id)->orderBy('id', 'desc')->paginate($paginate);
    }

    public function searchStatusPaginateOrder($status, $paginate, $with = [], $select = null)
    {
         $Order = Order::where('status', $status)
        ->with($with)
        ->orderBy('id', 'DESC')
        ->paginate($paginate);

        return $Order;
    }
}
