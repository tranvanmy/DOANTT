<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\OrderDetailRelations;

class OrderDetail extends Model
{
    use OrderDetailRelations;

    protected $fillable = [
        'id',
        'cooking_id',
        'order_id',
        'quantity',
        'price',
    ];
}
