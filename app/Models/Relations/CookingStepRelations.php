<?php

namespace App\Models\Relations;

use App\Models\Cooking;

trait CookingStepRelations
{
    public function cooking()
    {
        return $this->belongsTo(Cooking::class, 'cooking_id');
    }
}
