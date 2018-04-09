<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\CookingRepository;
use App\Contracts\Repositories\IngredientRepository;

class SearchController extends Controller
{
    protected $cooking;
    protected $ingredient;

    public function __construct(
        CookingRepository $cooking,
        IngredientRepository $ingredient
    ) {
        $this->cooking = $cooking;
        $this->ingredient = $ingredient;
    }

    public function index()
    {
        return view('sites._components.search');
    }

    public function searchName(Request $request)
    {
        if ($request->name) {
            return $this->cooking->searchName($request->name);
        } elseif ($request->ingredients) {
            return $this->cooking->getByArrIngredient($request->ingredients, ['level'], 30);
        }
    }

    public function searchIngredient(Request $request)
    {
        // return $request->name;
        return $this->ingredient->getByName($request->name);
    }
}
