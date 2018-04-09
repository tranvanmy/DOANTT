<?php

namespace App\Models\Relations;

use App\Models\User;

trait FollowRelations
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userFollow()
    {
        return $this->belongsTo(User::class, 'user_id_follow');
    }
}
