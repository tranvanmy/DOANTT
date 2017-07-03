<?php

namespace App\Models\Relations;

use App\Models\Cooking;
use App\Models\Order;

trait OrderDetailRelations
{
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function cooking()
    {
        return $this->belongsTo(Cooking::class, 'cooking_id');
    }
}
