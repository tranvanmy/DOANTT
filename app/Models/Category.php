<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CategoryRelations;

class Category extends Model
{
    use CategoryRelations;

    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'description',
        'icon',
        'status',
    ];

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
