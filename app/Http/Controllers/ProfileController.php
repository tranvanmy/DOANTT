<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\ProfileRepository;
use App\Helpers\Helpers;
use App\Models\User;
use App\Http\Requests\ProfileUserRequest;
use App\Http\Requests\PassWordResquest;

class ProfileController extends Controller
{

    protected $user;

    public function __construct(ProfileRepository $user)
    {
        $this->user = $user;
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
    public function show($id)
    {
        $totalPost = $this->user->total($id, ['posts']);
        $totalCookings = $this->user->totalCooking($id, ['cookings']);
        $allData = $this->user->takeAll($id);
     
        return view('sites._components.profileUser', compact('totalPost', 'totalCookings', 'allData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id, ['posts']);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changePass(PassWordResquest $request, $id)
    {
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);

        $user = $this->user->update($id, $data);
        if ($user) {
            $response['status'] = 'success';
            $response['message'] = trans('sites.edit_success');
            $response['action'] = trans('sites.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('sites.error_happen');
            $response['action'] = trans('sites.error');
        }

        return response()->json($response);
    }

    public function update(ProfileUserRequest $request, $id)
    {
        $exploded = explode(',', $request->avatar);

        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg')) {
            $extention = 'jpg';
        } else {
            $extention = 'png';
        }

        $fileName = str_random().'.'.$extention;

        $path = public_path().'/images/'.$fileName;

        file_put_contents($path, $decoded);

        $data = $request->except('avatar');
        $data['avatar'] = '/images/'.$fileName;
        $data['password'] = bcrypt($request->password);

        $user = $this->user->update($id, $data);
        if ($user) {
            $response['status'] = 'success';
            $response['message'] = trans('sites.edit_success');
            $response['action'] = trans('sites.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('sites.error_happen');
            $response['action'] = trans('sites.error');
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
