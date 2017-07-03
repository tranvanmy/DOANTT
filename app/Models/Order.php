<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\OrderRelations;

class Order extends Model
{
    use OrderRelations;

    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'phone',
        'note',
        'user_id',
        'total',
        'status',
    ];
}
