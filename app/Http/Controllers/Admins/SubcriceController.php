<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\SubcriceRepository;

class SubcriceController extends Controller
{
    protected $subcrice;

    public function __construct(SubcriceRepository $subcrice)
    {
        $this->subcrice = $subcrice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $userList = $this->subcrice->paginate('10');
            $response = [
                'pagination' => [
                    'total'        => $userList->total(),
                    'per_page'     => $userList->perPage(),
                    'current_page' => $userList->currentPage(),
                    'last_page'    => $userList->lastPage(),
                    'from'         => $userList->firstItem(),
                    'to'           => $userList->lastItem()
                ],
                'data' => $userList
            ];

            return response()->json($response);
        }

        return view("admin.subcrice.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->subcrice->delete($id)) {
            $response['message'] = trans('sites.delsucsess');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
    }
}
