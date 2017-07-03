<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\LevelRelations;

class Level extends Model
{
    use LevelRelations;

    protected $fillable = [
        'id',
        'name',
        'description',
    ];
}
