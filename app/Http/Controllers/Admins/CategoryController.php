<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\CategoryRepository;
use App\Helpers\Helpers;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = $this->category->paginate('10');
            // $categories = Helpers::categoriesToArray($categories);

             $response = [
                'pagination' => [
                    'total'        => $categories->total(),
                    'per_page'     => $categories->perPage(),
                    'current_page' => $categories->currentPage(),
                    'last_page'    => $categories->lastPage(),
                    'from'         => $categories->firstItem(),
                    'to'           => $categories->lastItem()
                ],
                'data' => $categories
            ];

            return response()->json($response);
        }

        return view('admin.category.index');
    }


    public function parentCategory(Request $request)
    {
        $categories = $this->category->all();
        $categories = Helpers::categoriesToArray($categories);
            // $categories = json_encode($categories);
        return response()->json($categories);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $exploded = explode(',', $request->icon);

        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg')) {
            $extention = 'jpg';
        } else {
            $extention = 'png';
        }

        $fileName = str_random().'.'.$extention;

        $path = public_path().'/images/'.$fileName;

        file_put_contents($path, $decoded);
        
        $data['icon'] = '/images/'.$fileName;
        $data['name'] = $request->name;
        $data['parent_id'] = $request->parent_id;
        $data['status'] = $request->status;

        if ($this->category->create($data)) {
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
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->category->update($id, $request->all());
        if ($category) {
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
        if ($this->category->hasChild($id)) {
            $response['status'] = 'error';
            $response['message'] = trans('admin.delete_chil_before');
            $response['action'] = trans('admin.error');

            return response()->json($response);
        }

        if ($category = $this->category->delete($id)) {
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
