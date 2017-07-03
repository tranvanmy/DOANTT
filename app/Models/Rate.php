<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\RateRelations;

class Rate extends Model
{
    use RateRelations;
    
    protected $fillable = [
        'id',
        'user_id',
        'rate_table_id',
        'rate_table_type',
    ];
}
