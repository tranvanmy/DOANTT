<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CookingStepRelations;

class CookingStep extends Model
{
    use CookingStepRelations;

    protected $fillable = [
        'id',
        'cooking_id',
        'step',
        'content',
        'status',
    ];
}
