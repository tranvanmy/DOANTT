<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Relations\UserRelations;

class User extends Authenticatable
{
    use Notifiable;
    use UserRelations;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const STATUS_CUSTOMER = 0;
    const STATUS_ADMIN = 1;
    const STATUS_DELETE = 3;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'level_id',
        'facebook_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
