<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CookingCategoryRelations;

class CookingCategory extends Model
{
    use CookingCategoryRelation;

    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'description',
    ];
}
