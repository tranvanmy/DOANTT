<?php

namespace App\Models\Relations;

use App\Models\User;
use App\Models\Cooking;

trait LevelRelations
{
    public function users()
    {
        return $this->hasMany(User::class, 'level_id');
    }

    public function cookings()
    {
        return $this->hasMany(Cooking::class, 'level_id');
    }
}
