<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

    class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_products = Product::all();

        return view('admin.products.index')
            ->with([
                'all_products' => $all_products,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /*
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'stock' => 'required|integer|max:255',
            'category' => 'required|max:255',
            'brand' => 'required|max:255',
            'status' => 'required|max:255',
            'description' => 'required|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,svg|max:10240',
        ];

        if($this->validate($request, $rules)) {

            $image_name = $request->image_path->getClientOriginalName();
            $image_full_name = time() . '_' . $image_name . '.'.$request->image_path->extension();
            $request->image->move(asset('assets/img/cameras/'), $image_name);
            dd($image_full_name);

            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category,
                'brand_id' => $request->brand,
                'status' => $request->status,
                'description' => $request->description,
                'image_path' => $request->image_path,
            ]);
            return redirect()->route('admin.products.create')->with('message', 'Product Added');
        };
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
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('message', 'Product' . $product->name .' Deleted');
    }
}