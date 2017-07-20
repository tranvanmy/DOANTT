<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\CookingRepository;
use App\Contracts\Repositories\WishlishRepository;
use Auth;

class CookingController extends Controller
{
    protected $cooking;
    protected $wishlish;

    public function __construct(CookingRepository $cooking, WishlishRepository $wishlish)
    {
        $this->cooking = $cooking;
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
                if($id == (Auth::user()->id))
                    $allData = $this->cooking->takeListCooking($id, '10');
                else {
                    $allData = $this->cooking->takeListCookingStatus($id, '10');
                }
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
    public function show($id)
    {
        $cooking = $this->cooking->find($id, [
            'user',
            'categories',
            'level',
            'rates',
            'comments',
            'cookingIngredients.ingredient',
            'cookingIngredients.unit',
            'steps',
            ]);

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $wishlish = null;
            
            if ($userId) {
                $wishlish = $this->wishlish->findWishlist($userId, $id);
            }
        }
        
        return view('sites._components.cooking_detail', compact('cooking', 'wishlish'));
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
        //
    }
}
