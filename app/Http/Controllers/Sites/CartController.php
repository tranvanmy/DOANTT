<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\CookingRepository;
use App\Http\Requests\OrderRequest;
use App\Contracts\Repositories\OrderRepository;
use App\Contracts\Repositories\OrderDetailRepository;
use Auth;

class CartController extends Controller
{
    protected $cooking;
    protected $order;
    protected $orderDetail;

    public function __construct(
        CookingRepository $cooking,
        OrderRepository $order,
        OrderDetailRepository $orderDetail
    ) {
        $this->cooking = $cooking;
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
            return session()->get('cart');
        }
        return view('sites._components.cart');
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
        $cart = session()->get('cart');
        if ($request->cooking) {
            if ($request->quantity) {
                $cart[$request->cooking] = $request->quantity;
                session()->put('cart', $cart);

                // return redirect('cart');
            } else {
                $cart[$request->cooking] = 1;
            }

            session()->put('cart', $cart);
        }
        return response()->json($cart);
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
    public function destroy($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);

        return $this->showCart();
    }

    public function showCart()
    {
        $data = [
            'cart' => '',
            'cookings' => '',
        ];

        if ($data['cart'] = session()->get('cart')) {
            $data['cookings'] = $this->cooking->withArrId(array_keys(session()->get('cart')), ['user']);
        }

        return $data;
    }

    public function checkout()
    {
        $data = $this->showCart();
        if ($data['cookings'] && $data['cart']) {
            $total = 0;
            foreach ($data['cookings'] as $key => $cooking) {
                $total += $cooking->price * $data['cart'][$cooking->id];
            }
            $data['total'] = $total;
        }


        return view('sites._components.checkout')->with('cookings', $data);
    }

    public function storeOrder(OrderRequest $request)
    {
        $order = $request->all();
        $order['user_id'] = Auth::user()->id;

        $data = $this->showCart();
        foreach ($data['cookings'] as $key => $cooking) {
            $arr[$cooking->user_id][$cooking->id]['quantity'] = $data['cart'][$cooking->id];
            $arr[$cooking->user_id][$cooking->id]['price'] = $cooking->price;
        }

        // dd($arr);
        foreach ($arr as $seller => $cookings) {
            $total = 0;
            foreach ($cookings as $cooking => $data) {
                $total += $data['quantity'] * $data['price'];
            }
            // dd($seller)
            $order['seller'] = $seller;
            $order['total'] = $total;
            $order['status'] = 0;

            $orderId = $this->order->create($order)->id;
            foreach ($arr[$seller] as $cooking_id => $attribute) {
                $this->orderDetail->create([
                        'cooking_id' => $cooking_id,
                        'order_id' => $orderId,
                        'quantity' => $attribute['quantity'],
                        'price' => $attribute['quantity'] * $attribute['price']
                    ]);
            }
        }
        session()->forget('cart');
        $invoices = $this->order->paginate(15, ['orderDetail']);

        return redirect('order')->with('message', trans('sites.order_success'));
    }

    public function showOrder($message = null)
    {
        $invoices = $this->order->getByUser(Auth::user()->id, 30, ['orderDetail.cooking', 'sellerr']);

        return view('sites._components.order_list')->with('invoices', $invoices);
    }

    public function showInvoice($id)
    {
        // return view('sites._components.invoice');

        $invoice = $this->order->find($id, ['orderDetail.cooking', 'sellerr']);
        // echo $invoice->user_id;
        // echo Auth::user()->id;
        if (Auth::user()->id != $invoice->user_id) {
            $invoice = null;
        }

        return view('sites._components.invoice')->with('invoice', $invoice);
    }
}
