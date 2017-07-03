<?php

namespace App\Models\Relations;

trait CommentRelations
{
    public function commentTable()
    {
        return $this->morphTo();
    }
}
