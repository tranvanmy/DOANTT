<?php

namespace App\Models\Relations;

use App\Models\User;
use App\Models\OrderDetail;

trait OrderRelations
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
