<?php

namespace App\Models\Relations;

use App\Models\User;

trait RateRelations
{
    public function rateTable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
