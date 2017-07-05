<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CategoryRepository;

class HomeController extends Controller
{
    protected $category;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->status(config('category.in_home_page'));
        return view('sites.home.index')->with(['categories' => $categories]);
    }
}
