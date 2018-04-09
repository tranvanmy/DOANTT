<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\FollowRepository;
use App\Helpers\Helpers;
use App\Models\User;
use App\Models\Follow;
use Auth;

class FollowController extends Controller
{
    protected $follow;

    public function __construct(FollowRepository $follow)
    {
        $this->follow = $follow;
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

    public function showFollow($id, Request $request)
    {
        if ($request->ajax()) {
            $allData = $this->follow->listFollowsUser($id, '10');
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

        return view('sites._components.listFollowsUser');
    }

    public function showByFollow($id, Request $request)
    {
        if ($request->ajax()) {
            $allData = $this->follow->listByFollowsUser($id, '10');
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

        return view('sites._components.listByFollow');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
        $curentUserid = Auth::user()->id;
        $user_id_follow = $request->id;

        $follow = $this->follow->findFollow($curentUserid, $user_id_follow);
       
        if (!$follow) {
            if ($this->follow->create([
                'user_id' => Auth::user()->id,
                'user_id_follow' => $request->id,
                'status' => 1 ])
            ) {
                    $response['status'] = 'success';
                    $response['statusFlow'] = 1;
                    $response['message'] = trans('sites.followsusecc');
                    $response['action'] = trans('sites.success');
            } else {
                    $response['status'] = 'error';
                    $response['statusFlow'] = 0;
                    $response['message'] = trans('admin.error_happen');
                    $response['action'] = trans('admin.error');
            }
        } else {
            if ($this->follow->delete($follow->id)) {
                $response['status'] = 'success';
                $response['statusFlow'] = 0;
                $response['message'] = trans('sites.unFollow');
                $response['action'] = trans('admin.success');
            } else {
                $response['status'] = 'error';
                $response['statusFlow'] = 1;
                $response['message'] = trans('admin.error_happen');
                $response['action'] = trans('admin.error');
            }
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
    public function destroy(Request $request, $id)
    {
        //
    }
}
