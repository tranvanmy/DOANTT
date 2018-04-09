<?php

namespace App\Models\Relations;

use App\Models\Wishlish;
use App\Models\User;
use App\Models\Cooking;

trait WishRelation
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cooking()
    {
        return $this->belongsTo(Cooking::class, 'cooking_id');
    }
}
