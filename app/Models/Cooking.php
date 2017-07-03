<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CookingRelations;

class Cooking extends Model
{
    use CookingRelations;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'time',
        'status',
        'rate_point',
        'description',
        'ration',
        'level_id',
        'image',
        'video_link',
    ];
}
