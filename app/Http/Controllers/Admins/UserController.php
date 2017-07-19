<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;
use App\Http\Requests\UserManageRequest;
use App\Http\Requests\ProfileAdminRequest;
use App\Helpers\Helpers;
use App\Models\User;
use Charts;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $userList = $this->user->paginate('10', ['level']);
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
            return view('admin.user.index');
    }

    public function showAdmin($id)
    {
        $user = $this->user->find($id, ['level']);

        return response()->json($user);
    }
    public function updaeAdmin(ProfileAdminRequest $request, $id)
    {
        if (($request->password) == ($request->newpassword)) {
            if ($request->avatar) {
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
                $data['avatar'] = '/images/'.$fileName;
            }
            $data['name'] =  $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['password'] = bcrypt($request->password);

            if ($this->user->update($id, $data)) {
                $response['status'] = 'success';
                $response['message'] = trans('sites.success_account');
                $response['action'] = trans('sites.success');
            } else {
                $response['status'] = 'error';
                $response['message'] = trans('sites.error_happen');
                $response['action'] = trans('sites.error');
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_account');
            $response['action'] = trans('admin.error');
        }
        
        return response()->json($response);
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
    public function store(UserManageRequest $request)
    {
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        if ($this->user->create($data)) {
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
        $data = $this->user->find($id, [
                'level',
                'posts',
                'cookings',
                'follows.userFollow',
                'followBys.user',
                'orders'
            ]);

        return view('admin.user.profile', compact('data'));
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
        $data = $request->except('password');

        $data['password'] = bcrypt($request->password);
        $user = $this->user->update($id, $data);
        if ($user) {
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
    public function destroy(Request $request, $id)
    {
        $data = $request->except('status');

        $data['status'] = config('permission.disable');
        if ($category = $this->user->update($id, $data)) {
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
