<?php

namespace App\Models\Relations;
use App\Models\User;
use App\Models\Comment;

trait CommentRelations
{
    public function commentTable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sub()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
