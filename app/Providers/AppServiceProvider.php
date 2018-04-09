<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Contracts\Repositories\PostRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot(Request $request)
    {
        $users_top_3 = new User;
        $categories = new Category;
        $posts = new Post;
        $posts = Post::where('status', 2)->orderBy('id', 'desc')->take('6')->get();
        $categories  = Category::where('status', '2')->get();
        $users_top_3 = User::where('status', 0)->orderBy('id', 'desc')->take('6')->get();

        View::share(['categories' => $categories,
                    'posts' => $posts,
                    'users_top_3' => $users_top_3
                ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
