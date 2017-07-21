<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\CookingRepository;

class HomeController extends Controller
{
    protected $category;
    protected $user;
    protected $cooking;
    protected $post;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CategoryRepository $category,
        UserRepository $user,
        PostRepository $post,
        CookingRepository $cooking
        ) {
        $this->category = $category;
        $this->user = $user;
        $this->cooking = $cooking;
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_top_1 = $this->user->getbyNumber('1', 0, ['level', 'cookings'],'id');
        $users_top_3 = $this->user->getbyNumber('3', 0, ['level', 'cookings'],'id');
        $users_top_6 = $this->user->getbyNumber('6', 0, ['level'],'id');
        $cookings = $this->cooking->getbyNumber('6', 1, ['level', 'comments'], 'id');
        $cooking_top_1 = $this->cooking->getbyNumber('1', 1, ['level', 'comments'], 'id');
        $categories = $this->category->status(config('category.in_home_page'));
        $posts = $this->post->getbyNumber('6', 2, [],'id');

        return view('sites.home.index', compact([
            'users_top_6',
            'users_top_3',
            'user_top_1',
            'cookings',
            'cooking_top_1',
            'categories',
            'posts'
        ]));
    }
}
