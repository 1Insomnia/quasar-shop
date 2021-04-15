<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $cameras_folder = "assets/img/cameras/";
    private $lenses_lenses = "assets/img/lenses/";

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
                'all_products' => $all_products
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
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'status' => 'required',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:10240'
        ];

        if ($this->validate($request, $rules)) {

            // Check if cameras or lenses and assign according path
            if ($request->category = 1) {
                $image_folder = $this->cameras_folder;
            } else {
                $image_folder = $this->lenses_folder;
            }

            // // Get Image Name
            $image_name = time() . $request->image->getClientOriginalName();
            // // Add timestamp
            $image_full_path = $image_folder . $image_name;
            // Move image to the according folder
            $request->image->move(public_path($image_folder), $image_name);

            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category,
                'brand_id' => $request->brand,
                'status' => $request->status,
                'description' => $request->description,
                'image_path' => $image_full_path
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

        return redirect()->route('admin.products.index')->with('message', 'Product' . $product->name . ' Deleted');
    }
}
