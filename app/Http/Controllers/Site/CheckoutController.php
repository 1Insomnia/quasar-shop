<?php

namespace App\Http\Controllers\Site;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find(auth()->user()->id);
        return view('site.checkout.index')
            ->with(['user' => $user]);
    }

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

        $request->validate($rules);

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

        $context = [];
        $order = Order::where('order_number', $request->id)->first();

        foreach( $order->items as $item) {
            if ($item->quantity > $item->product->stock) {
                Session::flash('error', 'A product in your order is not available anymore');
                return response()->json(['success' => false], 400);
            }
        }

        foreach ($order->items as $item) {
            array_push($context,
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $item->price * 100,
                        'product_data' => [
                            'name' => $item->product->name,
                        ]
                    ],
                    'quantity' => $item->quantity,
                ]);
        }

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $context,
            'mode' => 'payment',
            'success_url' => route('checkout.payment.success', $request->id),
            'cancel_url' => route('checkout.payment.fail', $request->id),

        ]);

        $order->update([
            'payment_id' => $checkout_session->id,
            'payment_method' => 'card',
        ]);

        return response()->json(["id" => $checkout_session->id]);
    }

    public function paymentSuccess(string $id)
    {
        $order = Order::where('order_number', $id)->first();

        Cart::destroy();

        $order->update([
            'status' => 'completed',
            'payment_status' => 1,
        ]);

        return view('site.checkout.payment-success');
    }

    public function paymentFail(string $id)
    {
        $order = Order::where('order_number', $id)->first();

        Cart::destroy();

        $order->update([
            'status' => 'declined',
        ]);

        return view('site.checkout.payment-fail');
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('cart.index')->with('message', "Order Canceled");
    }

}