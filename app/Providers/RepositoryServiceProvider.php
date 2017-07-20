<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        'category' => [
            \App\Contracts\Repositories\CategoryRepository::class,
            \App\Repositories\Eloquents\CategoryEloquentRepository::class,
        ],
        'user' => [
            \App\Contracts\Repositories\UserRepository::class,
            \App\Repositories\Eloquents\UserEloquentRepository::class,
        ],

        'profile' => [
            \App\Contracts\Repositories\ProfileRepository::class,
            \App\Repositories\Eloquents\ProfileEloquentRepository::class,
            ],

        'ingredient' => [
            \App\Contracts\Repositories\IngredientRepository::class,
            \App\Repositories\Eloquents\IngredientEloquentRepository::class,
        ],
        'post' => [
            \App\Contracts\Repositories\PostRepository::class,
            \App\Repositories\Eloquents\PostEloquentRepository::class,
        ],
        'blog' => [
            \App\Contracts\Repositories\BlogRepository::class,
            \App\Repositories\Eloquents\BlogEloquentRepository::class,
        ],
        'cooking' => [
            \App\Contracts\Repositories\CookingRepository::class,
            \App\Repositories\Eloquents\CookingEloquentRepository::class,
        ],
        'comment' => [
            \App\Contracts\Repositories\CommentRepository::class,
            \App\Repositories\Eloquents\CommentEloquentRepository::class,
        ],
        'rate' => [
            \App\Contracts\Repositories\RateRepository::class,
            \App\Repositories\Eloquents\RateEloquentRepository::class,
        ],    
        'follow' => [
            \App\Contracts\Repositories\FollowRepository::class,
            \App\Repositories\Eloquents\FollowEloquentRepository::class,
        ],
        'unit' => [
            \App\Contracts\Repositories\UnitRepository::class,
            \App\Repositories\Eloquents\UnitEloquentRepository::class,
        ],
        'cooking_ingredient' => [
            \App\Contracts\Repositories\CookingIngredientRepository::class,
            \App\Repositories\Eloquents\CookingIngredientEloquentRepository::class,
        ],
        'cooking_step' => [
            \App\Contracts\Repositories\CookingStepRepository::class,
            \App\Repositories\Eloquents\CookingStepEloquentRepository::class,
        ],
        'subcrice' => [
            \App\Contracts\Repositories\SubcriceRepository::class,
            \App\Repositories\Eloquents\SubcriceEloquentRepository::class,
        ],
        'wishlisht' => [
            \App\Contracts\Repositories\WishlishRepository::class,
            \App\Repositories\Eloquents\WishlishEloquentRepository::class,
        ],
        'order' => [
            \App\Contracts\Repositories\OrderRepository::class,
            \App\Repositories\Eloquents\OrderEloquentRepository::class,
        ],
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
    }
}
