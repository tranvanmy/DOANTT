<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\BlogRepository;
use Auth;

class BlogController extends Controller
{

    protected $post;

    public function __construct(BlogRepository $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $listPost = $this->post->paginagePost('10', ['user']);
            $response = [
                    'pagination' => [
                    'total'        => $listPost->total(),
                    'per_page'     => $listPost->perPage(),
                    'current_page' => $listPost->currentPage(),
                    'last_page'    => $listPost->lastPage(),
                    'from'         => $listPost->firstItem(),
                    'to'           => $listPost->lastItem()
                    ],
                    'data' => $listPost
                ];
            return response()->json($response);
        }
        return view('sites._components.blog');
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

    public function showDetail($id)
    {
        $detailPost = $this->post->find($id, 'user');
   
        return view('sites._components.updateDetailPost', compact('detailPost'));
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

    public function showList($id, Request $request)
    {
        if ($request->ajax()) {
            if (Auth::check()) {
                if ($id == (Auth::user()->id)) {
                    $allData = $this->post->takeListPost($id, '10');
                } else {
                    $allData = $this->post->takeListPostStatus($id, '10');
                }
            } else {
                $allData = $this->post->takeListPostStatus($id, '10');
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

        return view('sites._components.listPostUser');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailPost = $this->post->find($id, 'user');
   
        return view('sites._components.detailBlog', compact('detailPost'));
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
