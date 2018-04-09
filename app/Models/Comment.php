<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CommentRelations;

class Comment extends Model
{
    use CommentRelations;
    
    protected $fillable = [
        'id',
        'user_id',
        'comment_table_id',
        'comment_table_type',
        'content',
        'parent_id'
    ];
}
