<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;


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
        )->associate(Product::class);
        return response()->json(['success' => Cart::content()]);
    }

    public function show(Request $request, int $id)
    {
        return response()->json(['context' => Cart::content()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {

        $data = $request->json()->all();

        $validates = Validator::make($request->all(), [
            'quantity' => 'numeric|required|between:1,5',
        ]);

        if ($validates->fails()) {
            Session::flash('error', 'Product quantity must be between 1 and 5');
            return response()->json([
                'error' => 'Cart quantity has not been updated'
            ]);
        }

        if ($data['quantity'] > $data['stock']) {
            Session::flash('error', 'Product not available for the desired quantity');
            return response()->json([
                'error' => 'Cart quantity has not been updated'
            ]);
        }

        // if ($request->quantity > $stock) {
        //     $request->session()->flash('status', 'Not enough product in stock');
        //     return response()->json(['status', 'Not enough product in stock']);
        // }

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
        if ($id === "all") {
            Cart::destroy();
            return redirect()->route('cart.index')->with('message', 'Cart emptied');
        } else {
            Cart::remove($id);
            return redirect()->route('cart.index')->with('message', 'Product Deleted');
        }
    }

}