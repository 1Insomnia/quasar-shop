<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        Cart::setGlobalTax(0);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cart_content = Cart::content();
        $cart_subtotal = Cart::subTotal();
        $cart_total = Cart::total();
        $cart_count = Cart::count();

        return view('site.cart.index')
            ->with([
                'cart_content' => $cart_content,
                'cart_subtotal' => $cart_subtotal,
                'cart_total' => $cart_total,
                'cart_count' => $cart_count,
            ]);
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
        $product = Product::findOrFail($request->id);

        Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => $request->quantity,
                'weight' => 500,
                'attributes' => [
                ],
                'options' => [
                    'image_path' => $product->image_path,
                ],
                'associatedModel' => $product,
            ]
        );
        return response()->json(['ok' => Cart::content()]);
    }

    public function show(Request $request, int $id)
    {
        return response()->json(['context' => Cart::content()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        Cart::update($id, $request->quantity);
        return response()->json(['response' => 'Product updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return redirect()->route('cart.index')->with('message', 'Product deleted');
    }
}
