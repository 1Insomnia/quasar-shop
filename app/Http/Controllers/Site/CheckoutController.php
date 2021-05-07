<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        return view('site.checkout.index');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function placeOrder(Request $request)
    {
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

        return redirect()->route('checkout.payment');
    }

    public function sessionPayment(Request $request)
    {
        Stripe::setApiKey('sk_test_51InfIODgJ03o6hxSJ7S7kd0Vc6iJaueAymW4o3tRdFEBPDnYmDHTlIRwyDQQ56hhQxpiFfQMnAOwnkAiGJfiNw11006wWM8Wn9');

        $content = Cart::content();
        $context = [];

        foreach ($content as $row) {
            array_push($context,
                [
                    'price_data' => [
                        'currency' => 'usd',
                        // In cents
                        'unit_amount' => floatval($row->price) * 100,
                        'product_data' => [
                            'name' => $row->name,
                            'images' => [$row->options->image_path]
                        ]
                    ],
                    'quantity' => $row->qty,
                 ]
            );
        }

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $context,
            'mode' => 'payment',
            'success_url' => route('cart.index'),
            'cancel_url' => route('cart.index'),

        ]);

        return response()->json(['id' => $checkout_session->id]);
    }
}
