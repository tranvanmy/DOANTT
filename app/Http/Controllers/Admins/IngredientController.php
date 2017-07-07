<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\IngredientRepository;
use App\Http\Requests\IngredientRequest;

class IngredientController extends Controller
{
    protected $ingredient;

    public function __construct(IngredientRepository $ingredient)
    {
        $this->ingredient = $ingredient;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $ingredient = $this->ingredient->paginate('3');
            $response = [
                'pagination' => [
                    'total' => $ingredient->total(),
                    'per_page' => $ingredient->perPage(),
                    'current_page' => $ingredient->currentPage(),
                    'last_page' => $ingredient->lastPage(),
                    'from' => $ingredient->firstItem(),
                    'to' => $ingredient->lastItem()
                ],
                'data' => $ingredient
            ];

            return response()->json($response);
        }
            return view('admin.ingredient.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(IngredientRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientRequest $request)
    {
        if ($this->ingredient->create($request->all())) {
            $response['status'] = 'success';
            $response['message'] = trans('admin.add_success');
            $response['action'] = trans('admin.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IngredientRequest $request, $id)
    {
        $ingredient = $this->ingredient->update($id, $request->all());
        if ($ingredient) {
            $response['status'] = 'success';
            $response['message'] = trans('admin.edit_success');
            $response['action'] = trans('admin.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($ingredient = $this->ingredient->delete($id)) {
            $response['status'] = 'success';
            $response['message'] = trans('admin.delete_success');
            $response['action'] = trans('admin.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
    }
}
