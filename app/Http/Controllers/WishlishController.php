<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\WishlishRepository;
use App\Helpers\Helpers;
use App\Models\User;
use App\Models\Cooking;
use App\Models\Wishlish;
use Auth;

class WishlishController extends Controller
{
    protected $wishlish;

    public function __construct(WishlishRepository $wishlish)
    {
        $this->wishlish = $wishlish;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $allData = $this->wishlish->listWish($id);
            $response = [
                'pagination' => [
                'total'        => $allData->total(),
                'per_page'     => $allData->perPage(),
                'current_page' => $allData->currentPage(),
                'last_page'    => $allData->lastPage(),
                'from'         => $allData->firstItem(),
                'to'           => $allData->lastItem()
                ],
                'data' => $allData
            ];
            return response()->json($response);
        }
        return view('sites._components.listWishlish');
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
        $curentUserid = Auth::user()->id;
        $cooking_id = $id;

        $wishlish = $this->wishlish->findWishlist($curentUserid, $cooking_id);

        if (!$wishlish) {
            if ($this->wishlish->create([
                'user_id' => Auth::user()->id,
                'cooking_id' => $id,
                'status' => 1 ])
                ) {
                $response['status'] = 'success';
                $response['wishlishstatus'] = 1;
                $response['message'] = trans('sites.wishlish_cooking');
                $response['action'] = trans('sites.success_wishlish');
            } else {
                $response['status'] = 'error';
                $response['wishlishstatus'] = 0;
                $response['message'] = trans('admin.error_happen');
                $response['action'] = trans('admin.error');
            }
        } else {
            if ($this->wishlish->delete($wishlish->id)) {
                $response['status'] = 'error';
                $response['wishlishstatus'] = 0;
                $response['message'] = trans('sites.unlike_cooking');
                $response['action'] = trans('sites.errorlike');
            } else {
                $response['status'] = 'error';
                $response['wishlishstatus'] = 1;
                $response['message'] = trans('admin.error_happen');
                $response['action'] = trans('admin.error');
            }
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
        //
    }
}
