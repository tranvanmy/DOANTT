<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\OrderRepository;
use App\Contracts\Repositories\OrderDetailRepository;
use App\Http\Controllers\Admins\PDF;
use Auth;

class OrderController extends Controller
{
    protected $order;
    protected $orderDetail;

    public function __construct(
        OrderRepository $order,
        OrderDetailRepository $orderDetail
    ) {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $order = $this->order->get(10, ['user', 'sellerr', 'orderDetail.cooking.user']);
            $response = [
                'pagination' => [
                    'total' => $order->total(),
                    'per_page' => $order->perPage(),
                    'current_page' => $order->currentPage(),
                    'last_page' => $order->lastPage(),
                    'from' => $order->firstItem(),
                    'to' => $order->lastItem()
                ],
                'data' => $order
            ];

            return response()->json($response);
        }


        return view('admin.order.index');
    }

    public function invoice(Request $request, $id)
    {

        $data = $this->orderDetail->getByOrder($id, ['cooking']);
        $order = $this->order->firstByIdOrder(['user', 'sellerr', 'orderDetail.cooking.user'], $id);

        return view('admin.invoice.invoice',  compact('data', 'order'));
    }

    public function down(Request $request, $id)
    {

        $data = $this->orderDetail->getByOrder($id, ['cooking']);
        $order = $this->order->firstByIdOrder(['user', 'sellerr', 'orderDetail.cooking.user'], $id);

        // return view('admin.invoice.invoice',  compact('data', 'order'));

        // // dd($id);
        $pdf = \PDF::loadView('admin.invoice.invoice',  compact('data', 'order'));
        
        return $pdf->download('invoice.pdf');
    }

    public function searchStatus(Request $request)
    {
        $order = $this->order->searchStatusPaginateOrder($request[0], 10, ['user', 'sellerr', 'orderDetail.cooking.user']);
        $response = [
            'pagination' => [
                'total' => $order->total(),
                'per_page' => $order->perPage(),
                'current_page' => $order->currentPage(),
                'last_page' => $order->lastPage(),
                'from' => $order->firstItem(),
                'to' => $order->lastItem()
            ],
            'data' => $order
        ];

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
        return $this->orderDetail->getByOrder($id, ['cooking']);
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
        if ($this->order->update($id, $request->all())) {
            return 1;
        }

        return 0;
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

    public function orderSell(Request $request)
    {
        if ($request->ajax()) {
            $order = $this->order->getWithSeller(10, Auth::user()->id, ['user', 'sellerr']);
            $response = [
                'pagination' => [
                    'total' => $order->total(),
                    'per_page' => $order->perPage(),
                    'current_page' => $order->currentPage(),
                    'last_page' => $order->lastPage(),
                    'from' => $order->firstItem(),
                    'to' => $order->lastItem()
                ],
                'data' => $order
            ];

            return response()->json($response);
        }

        return view('sites._components.order_list_for_me');
    }
}
