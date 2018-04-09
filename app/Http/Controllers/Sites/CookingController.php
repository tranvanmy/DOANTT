<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\CookingRepository;
use App\Contracts\Repositories\CommentRepository;
use App\Contracts\Repositories\RateRepository;
use App\Contracts\Repositories\WishlishRepository;
use App\Http\Controllers\Sites\Comment;
use Auth;

class CookingController extends Controller
{
    protected $cooking;
    protected $comments;
    protected $rates;
    protected $wishlish;

    public function __construct(
        CookingRepository $cooking,
        CommentRepository $comments,
        RateRepository $rates,
        WishlishRepository $wishlish
    ) {
        $this->cooking = $cooking;
        $this->comments = $comments;
        $this->rates = $rates;
        $this->wishlish = $wishlish;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            
        if ($request->ajax()) {
            $repices = $this->cooking->paginageCooking('10', ['level']);
            $response = [
                'pagination' => [
                'total'        => $repices->total(),
                'per_page'     => $repices->perPage(),
                'current_page' => $repices->currentPage(),
                'last_page'    => $repices->lastPage(),
                'from'         => $repices->firstItem(),
                'to'           => $repices->lastItem()
                ],
                'data' => $repices
            ];

            return response()->json($response);
        }

        return view('sites._components.recipes');
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

    public function showCooking($id, Request $request)
    {
        if ($request->ajax()) {
            if (Auth::check()) {
                if ($id == (Auth::user()->id)) {
                    $allData = $this->cooking->takeListCooking($id, '10');
                } else {
                    $allData = $this->cooking->takeListCookingStatus($id, '10');
                }
            } else {
                    $allData = $this->cooking->takeListCookingStatus($id, '10');
            }
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
        return view('sites._components.listCookingUser');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
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

        if ($cooking && $request->ajax()) {
            if ($cooking->status == 0) {
                if (Auth::check() && Auth::user()->id == $cooking->user->id) {
                    return response()->json($cooking);
                }
            } elseif ($cooking->status == 1) {
                return response()->json($cooking);
            }
        }
        if ($cooking) {
            $cooking_id = $cooking->id;
            $cooking_user_id = $cooking->user->id;
        } else {
            $cooking_id = null;
            $cooking_user_id = null;
        }

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $wishlish = null;

            if ($userId) {
                $wishlish = $this->wishlish->findWishlist($userId, $id);
            }
        }

        return view('sites._components.cooking_detail', compact('cooking_id', 'cooking_user_id', 'wishlish'));
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

    public function updatePrice(Request $request, $id)
    {
        // return ($id);
        $data['price'] = $request->price;

        $updatePrice = $this->cooking->update($id, $data);
        
        if ($updatePrice) {
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
        //
    }

    public function showComment($id, Request $request)
    {
        if ($request->ajax()) {
            if ($request->type) {
                $comments = $this->comments->getComments($id, 'posts');
            } else {
                $comments = $this->comments->getComments($id, 'cookings');
            }

            $response['comments'] = $comments;
            $response['user_id'] = Auth::check() ? Auth::user()->id : null;
            $response['pagination'] = [
                'total'        => $comments->total(),
                'per_page'     => $comments->perPage(),
                'current_page' => $comments->currentPage(),
                'last_page'    => $comments->lastPage(),
                'from'         => $comments->firstItem(),
                'to'           => $comments->lastItem()
            ];

            return $response;
        }
    }

    public function submitComment(CommentRequest $request)
    {
        if (!$request->id) {
            $comments = $this->comments->create($request->all());
        } else {
            $comments = $this->comments->update($request->id, $request->all());
        }
        $comments = $this->comments->getComments($request->comment_table_id, 'cookings');

        return $comments;
    }

    public function deleteComment($id)
    {
        if ($this->comments->delete($id)) {
            return 1;
        }

        return 0;
    }

    public function showRate($id, Request $request)
    {
        return $this->cooking->getCooking($id);
    }
}
