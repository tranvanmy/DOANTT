<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\UnitRelations;

class Unit extends Model
{
    use UnitRelations;

    protected $fillable = [
        'id',
        'name',
    ];
}
