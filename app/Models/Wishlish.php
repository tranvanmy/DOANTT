<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\WishRelation;

class Wishlish extends Model
{
    use WishRelation;
    protected $table = 'wishlish';
    protected $fillable = [
      'id',
      'user_id',
      'cooking_id',
      'status'
    ];
}
