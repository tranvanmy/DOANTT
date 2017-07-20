<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\CookingRepository;
use App\Contracts\Repositories\OrderRepository;
use App\Helpers\Helpers;
use Charts;
use App\Models\User;
use App\Models\Post;
use App\Models\Cooking;
use App\Models\Order;
use App\Http\Requests\UserManageRequest;
use App\Http\Requests\ProfileAdminRequest;

class UserController extends Controller
{
    protected $user;
    protected $order;
    protected $post;
    protected $recipe;

    public function __construct(
        UserRepository $user,
        PostRepository $post,
        CookingRepository $recipe,
        OrderRepository $order
    ) {
        $this->user = $user;
        $this->order = $order;
        $this->post = $post;
        $this->recipe = $recipe;
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

    public function report()
    {
        $chartUser = Charts::database(User::all(), 'bar', 'highcharts')
            ->title(trans('admin.user'))
            ->elementLabel(trans('admin.total'))
            ->dimensions(800, 500)
            ->responsive(true)
            ->groupBy('status', null, [
                0 => trans('admin.customer'),
                1 => trans('admin.admin'),
                2 => trans('admin.user_disable')
            ]);
        $chartOrder = Charts::database(Order::all(), 'bar', 'highcharts')
            ->title(trans('admin.order'))
            ->elementLabel(trans('admin.total'))
            ->dimensions(800, 500)
            ->responsive(false)
            ->groupBy('status', null, [
                0 => trans('admin.order_pending'),
                1 => trans('admin.order_success'),
                2 => trans('admin.order_cancel')
            ]);
        $chartPost = Charts::database(Post::all(), 'line', 'highcharts')
            ->title(trans('admin.post'))
            ->elementLabel(trans('admin.total'))
            ->dimensions(800, 500)
            ->responsive(false)
            ->groupByDay();
        $chartRepices = Charts::database(Cooking::all(), 'bar', 'highcharts')
            ->title(trans('admin.cooking'))
            ->elementLabel(trans('admin.total'))
            ->dimensions(800, 500)
            ->responsive(false)
            ->groupBy('status', null, [
                0 => trans('admin.recipe_pending'),
                1 => trans('admin.recipe_show'),
                2 => trans('admin.recipe_editing'),
                3 => trans('admin.recipe_order')
            ]);

        $sumPost = $this->post->countAll();
        $sumOrder = $this->order->countAll();
        $sumRecipe = $this->recipe->countAll();
        $sumUser = $this->user->countAll();

        return view('admin.report.index', [
            'chartUser' => $chartUser,
            'chartOrder' => $chartOrder,
            'chartPost' => $chartPost,
            'chartRepices' => $chartRepices,
            'sumPost' => $sumPost,
            'sumOrder' => $sumOrder,
            'sumRecipe' => $sumRecipe,
            'sumUser' => $sumUser,
        ]);
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
