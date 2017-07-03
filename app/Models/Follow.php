<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\FollowRelations;

class Follow extends Model
{
    use FollowRelations;

    protected $fillable = [
        'id',
        'user_id',
        'user_id_follow',
    ];
}
