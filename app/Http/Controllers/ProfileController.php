<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\ProfileRepository;
use App\Contracts\Repositories\FollowRepository;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\SubcriceRepository;
use App\Helpers\Helpers;
use App\Models\User;
use App\Http\Requests\ProfileUserRequest;
use App\Http\Requests\CreatPostUserRequest;
use App\Http\Requests\PassWordResquest;
use Auth;

class ProfileController extends Controller
{

    protected $user;
    protected $follow;
    protected $post;
    protected $subcrice;

    public function __construct(
        ProfileRepository $user,
        FollowRepository $follow,
        PostRepository $post,
        SubcriceRepository $subcrice
    ) {
        $this->user = $user;
        $this->follow = $follow;
        $this->post = $post;
        $this->subcrice = $subcrice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master = $this->user->takeMaster('9', ['level']);

        return view('sites._components.top_mater');
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
    public function subcrice(Request $request)
    {
        $data['email'] = $request->email;

        if ($this->subcrice->create($data)) {
            $response['message'] = trans('sites.susbuccess');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
    }

    public function showMater(Request $request)
    {
        if ($request->ajax()) {
                $allData = $this->user->takeMaster('9', ['level']);
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

        return view('sites._components.topCheft');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatPostUserRequest $request)
    {
        $exploded = explode(',', $request->image);

        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg')) {
            $extention = 'jpg';
        } else {
            $extention = 'png';
        }

        $fileName = str_random().'.'.$extention;

        $path = public_path().'/images/'.$fileName;

        file_put_contents($path, $decoded);
        
        $data['image'] = '/images/'.$fileName;
        $data['user_id'] = Auth::user()->id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['content'] = $request->content;
        $data['status'] = '1';

        if ($this->post->create($data)) {
            $response['status'] = 'success';
            $response['message'] = trans('sites.addpost');
            $response['action'] = trans('admin.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
    }

    public function showList($id, Request $request)
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
        if (Auth::check()) {
            if ($id == (Auth::user()->id)) {
                $user_id = Auth::user()->id;
                $statusfollow = $this->follow->findFollow($user_id, $id);
                $allData = $this->user->takeAll($id);
            } else {
                $allData = $this->user->publicPost($id);
            }
        } else {
            $allData = $this->user->publicPost($id);
        }

        if (Auth::check()) {
             $user_id = Auth::user()->id;
            $statusfollow = $this->follow->findFollow($user_id, $id);
        }

        $totalPost = $this->user->total($id, ['posts']);
        $totalCookings = $this->user->totalCooking($id, ['cookings']);

        return view('sites._components.profileUser', compact('totalPost', 'totalCookings', 'allData', 'statusfollow'));
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

    public function editPost($id)
    {
        $post = $this->post->find($id, ['user']);

        return response()->json($post);
    }

    public function updatePost(Request $request, $id)
    {
        if ($request->image) {
            $exploded = explode(',', $request->image);

            $decoded = base64_decode($exploded[1]);

            if (str_contains($exploded[0], 'jpeg')) {
                $extention = 'jpg';
            } else {
                $extention = 'png';
            }

            $fileName = str_random().'.'.$extention;

            $path = public_path().'/images/'.$fileName;

            file_put_contents($path, $decoded);

            $data['image'] = '/images/'.$fileName;
        }
        $data['user_id'] = Auth::user()->id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['content'] = $request->content;
        $data['status'] = '1';

        if ($this->post->update($id, $data)) {
            $response['status'] = 'success';
            $response['message'] = trans('sites.editpostuser');
            $response['action'] = trans('admin.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
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
            $response['message'] = trans('sites.success_pass');
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

            $data = $request->except('avatar');
            
            $data['avatar'] = '/images/'.$fileName;
        }

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
        $post = $this->post->find($id, ['user']);
        
        return response()->json($post);
    }

    public function deletePost($id)
    {
        $deltePost = $this->post->delete($id);
        if ($deltePost) {
            $response['status'] = 'success';
            $response['message'] = trans('sites.edit_success');
            $response['action'] = trans('sites.delete_succes');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('sites.error_happen');
            $response['action'] = trans('sites.error');
        }

        return response()->json($response);
    }
}
