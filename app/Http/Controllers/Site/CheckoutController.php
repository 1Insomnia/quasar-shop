<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $content = Cart::content();
        $context = [];

        foreach ($content as $row) {
            array_push($context,
                [
                    'name' => $row->name,
                    'image_path' => $row->options->image_path,
                ]
            );
        }
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Stripe::setApiKey('sk_test_51InfIODgJ03o6hxSJ7S7kd0Vc6iJaueAymW4o3tRdFEBPDnYmDHTlIRwyDQQ56hhQxpiFfQMnAOwnkAiGJfiNw11006wWM8Wn9');
        $total = floatval(Cart::total(2, "", "")) / 100;

        $content = Cart::content();
        $context = [];

        foreach ($content as $row) {
            dd($row);
        }

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $total * 100,
                    'product_data' => [
                        'name' => 'Stubborn Attachments',
                        'images' => ["https://i.imgur.com/EHyR2nP.png"],
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('cart.index'),
            'cancel_url' => route('cart.index'),
        ]);

        return response()->json(['id' => $checkout_session->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
