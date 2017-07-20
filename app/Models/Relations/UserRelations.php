<?php
namespace App\Models\Relations;

use App\Models\Category;
use App\Models\CookingCategory;
use App\Models\PostCategory;
use App\Models\Cooking;
use App\Models\Level;
use App\Models\Order;
use App\Models\Post;
use App\Models\Rate;
use App\Models\Follow;
use App\Models\Comment;
use App\Models\Wishlish;

trait UserRelations
{
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function cookings()
    {
        return $this->hasMany(Cooking::class, 'user_id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'user_id');
    }
    
    public function follows()
    {
        return $this->hasMany(Follow::class, 'user_id');
    }

    public function followBys()
    {
        return $this->hasMany(Follow::class, 'user_id_follow');
    }
    public function wishlish()
    {
        return $this->hasMany(Wishlish::class, 'user_id');
    }
}
