<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Requests\CokingRequest;
use App\Http\Requests\CookingIngredientRequest;
use App\Http\Requests\CookingStepRequest;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\CookingRepository;
use App\Contracts\Repositories\UnitRepository;
use App\Contracts\Repositories\IngredientRepository;
use App\Contracts\Repositories\CookingIngredientRepository;
use App\Contracts\Repositories\CookingStepRepository;
use App\Contracts\Repositories\CategoryRepository;
use Auth;

class SubmitCookingController extends Controller
{
    protected $cooking;
    protected $unit;
    protected $ingredient;
    protected $cookingIngredient;
    protected $cookingStep;
    protected $category;

    public function __construct(
        CookingRepository $cooking,
        UnitRepository $unit,
        IngredientRepository $ingredient,
        CookingIngredientRepository $cookingIngredient,
        CookingStepRepository $cookingStep,
        CategoryRepository $category
    ) {
        $this->cooking = $cooking;
        $this->unit = $unit;
        $this->ingredient = $ingredient;
        $this->cookingIngredient = $cookingIngredient;
        $this->cookingStep = $cookingStep;
        $this->category = $category;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(empty($request->all())) {
                $cooking = $this->cooking->getCookingCreating(Auth::user()->id);
            } else {
                $cooking = $this->cooking->find($request['0'], [
                    'categories',
                    'cookingIngredients',
                    'steps'
                ]);
            }

            $notification['cooking_not_empty'] = trans('sites.cooking_not_empty');
            $notification['categories_not_empty'] = trans('sites.categories_not_empty');
            $notification['steps_not_empty'] = trans('site.steps_not_empty');
            $notification['ingredients_not_empty'] = trans('sites.ingredient_not_empty');
            $notification['cooking_success'] = trans('sites.cooking_success');

            $response['cooking'] = $cooking;
            $response['units'] = $this->unit->all();
            $response['notification'] = $notification;

            return $response;
        }

        
        return view('sites._components.add');
    }

    public function showEdit(Request $request, $id)
    {
        if ($request->ajax()) {
            // $cooking = $this->cooking->find($id, [
            //     'categories',
            //     'cookingIngredients',
            //     'steps'
            // ]);
            $cooking = $this->cooking->find($id, [
            'user',
            'categories',
            'level',
            'rates',
            'comments',
            'cookingIngredients.ingredient',
            'cookingIngredients.unit',
            'steps'
        ]);

            $notification['cooking_not_empty'] = trans('sites.cooking_not_empty');
            $notification['categories_not_empty'] = trans('sites.categories_not_empty');
            $notification['steps_not_empty'] = trans('site.steps_not_empty');
            $notification['ingredients_not_empty'] = trans('sites.ingredient_not_empty');
            $notification['cooking_success'] = trans('sites.cooking_success');

            $response['cooking'] = $cooking;
            $response['units'] = $this->unit->all();
            $response['notification'] = $notification;

            return $response;
        }


        return view('sites._components.editCooking', [
            'id' => $id
        ]);
    }

    public function store(CokingRequest $request)
    {
        // dd($request->all());
        if ($request->id) {
            $cooking = $this->cooking->update($request->id, $request->all());
            if ($cooking) {
                $response = $request->id;
            }
        } else {
            $cooking = $request->all();
            $cooking['user_id'] = Auth::user()->id;
            $cooking['status'] = 2;
            $response = $this->cooking->create($cooking)->id;
        }

        return $response;
    }

    public function search(Request $request)
    {
        $ingredients = $this->ingredient->getByName($request->data);

        return $ingredients;
    }

    public function getUnits()
    {
        return $this->unit->all();
    }

    public function uploadImage(Request $request)
    {
        $name =  Helpers::importFile($request->image, config('upload.user_upload'));
        $name = config('upload.user_upload') . $name;
        Helpers::deleteFile($request->oldImage);

        return $name;
    }

    public function addIngredient(CookingIngredientRequest $request)
    {
        $data = $request->except(['ingredientName']);
        if ($data['ingredient_id'] == '') {
            $ingredient = $this->ingredient->checkName($request->name);
            if (!$ingredient) {
                $ingredient = $this->ingredient->create([
                    'name' => $request->ingredientName,
                    'description' => 'user create',
                    'status' => 0]);
            }
            $data['ingredient_id'] = $ingredient->id;
        }
        if ($request->id) {
            $this->cookingIngredient->update($request->id, $data);
            $cookingIngredient = $this->cookingIngredient->find($request->id, [], []);
        } else {
            $cookingIngredient = $this->cookingIngredient->create($data);
        }


        return $cookingIngredient->load(['ingredient', 'unit']);
    }

    public function addStep(CookingStepRequest $request)
    {
        $data = [];
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request);
        }
        $data['id'] = $request->id;
        $data['step'] = $request->step;
        $data['content'] = $request->content;
        $data['status'] = $request->status;
        $data['cooking_id'] = $request->cooking_id;
        if ($data['id']) {
            $this->cookingStep->update($request->id, $data);
            $step = $this->cookingStep->find($request->id, [], []);
        } else {
            unset($data['id']);
            $step = $this->cookingStep->create($data);
        }

        return $step;
    }

    public function deleteStep($id)
    {
        if ($this->cookingStep->delete($id)) {
            return $id;
        }

        return 0;
    }

    public function deleteIngredient($id)
    {
        if ($this->cookingIngredient->delete($id)) {
            return $id;
        }

        return 0;
    }

    public function getCookingCategories()
    {
        return $this->category->getAll();
    }

    public function storeCookingCategories(Request $request)
    {
        return $this->cooking->storeCookingCategories($request->cooking_id, $request->categories);
    }

    public function cancelCooking($id)
    {
        if ($this->cooking->deleteCoking($id)) {
            return 1;
        }
    }
}
