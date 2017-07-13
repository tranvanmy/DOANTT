<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CookingRelations;
use Laravel\Scout\Searchable;

class Cooking extends Model
{
    use CookingRelations;
    use Searchable;

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

    public function searchableAs()
    {
        return 'cooking';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }
}
