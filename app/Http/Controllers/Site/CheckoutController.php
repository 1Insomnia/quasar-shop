<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\User;

class CheckoutController extends Controller
{
    private OrderRepository $orderRepository;

    /**
     * CheckoutController constructor.
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function getCheckout(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find(auth()->user()->id);
        return view('site.checkout.index')
            ->with(['user' => $user]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function placeOrder(Request $request)
    {
        if (Cart::count() <= 0) return;

        $rules = [
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'phone' => 'required',
        ];

        $this->validate($request, $rules);
        $order = $this->orderRepository->storeOrderDetails($request->all());
        $id = $order->order_number;

        return redirect()->route('checkout.confirm', $id);
    }

    public function checkoutConfirm(string $id)
    {
        $order = Order::where('order_number', $id)->first();
        return view('site.checkout.payment')
            ->with(['order' => $order]);
    }

    public function checkoutPayment(Request $request)
    {
        Stripe::setApiKey('sk_test_51InfIODgJ03o6hxSJ7S7kd0Vc6iJaueAymW4o3tRdFEBPDnYmDHTlIRwyDQQ56hhQxpiFfQMnAOwnkAiGJfiNw11006wWM8Wn9');

//        $content = Cart::content();
        $context = [];
        $order = Order::where('order_number', $request->order_number)->first();
        dd($order);

//        if (Cart::count() > 0 ) {
//            foreach ($content as $row) {
//                array_push($context,
//                    [
//                        'price_data' => [
//                            'currency' => 'usd',
//                            // In cents
//                            'unit_amount' => floatval($row->price) * 100,
//                            'product_data' => [
//                                'name' => $row->name,
//                                'images' => [$row->options->image_path]
//                            ]
//                        ],
//                        'quantity' => $row->qty,
//                     ]
//                );
//            }
//        }


        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $context,
            'mode' => 'payment',
            'success_url' => route('cart.index'),
            'cancel_url' => route('cart.index'),

        ]);

        return response()->json(["id" => $checkout_session->id]);
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('cart.index')->with('message', "Order Canceled");
    }
}
