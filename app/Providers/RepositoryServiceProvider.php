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
        
        'cooking' => [
            \App\Contracts\Repositories\CookingRepository::class,
            \App\Repositories\Eloquents\CookingEloquentRepository::class,
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
