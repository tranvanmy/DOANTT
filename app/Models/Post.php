<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\PostRelations;

class Post extends Model
{
    use PostRelations;
    
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'status',
        'content',
    ];
}
