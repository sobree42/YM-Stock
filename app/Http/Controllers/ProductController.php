<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Category;
use App\Store;
use App\UnitType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brand', 'category', 'store', 'unit_type', 'last_transaction')->get();
        // dd($products->toArray());
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $stores = Store::all();
        $unit_types = UnitType::all();

        return view('product.create', [
            'brands' => $brands,
            'categories' => $categories,
            'stores' => $stores,
            'unit_types' => $unit_types
            ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|min:4|max:255',
            'brand_id' => 'required',
            'category_id' => 'required',
            'store_id' => 'required',
            'unit_type' => 'required',

        ])->validate();

        Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'store_id' => $request->store_id,
            'quantity' => 0,
            'unit_type_id' => $request->unit_type,

        ]);

        return redirect()->route('product.index')->with('success', 'Product added!');
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
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        $stores = Store::all();
        $unit_types = UnitType::all();
        return view('product.edit', [
            'product' =>$product,
            'brands' => $brands,
            'categories' => $categories,
            'stores' => $stores,
            'unit_types' => $unit_types
            ]);
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
        Validator::make($request->all(), [
            'name' => 'required|min:4|max:255',
            'brand_id' => 'required',
            'category_id' => 'required',
            'store_id' => 'required',
            'unit_type' => 'required',
        ])->validate();

        $product = Product::find($id);
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->store_id = $request->store_id;
        $product->unit_type_id = $request->unit_type;

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {

            Product::destroy($id);
            return redirect()->route('product.index')->with('success', 'Product deleted!');

        } catch (QueryException $e) {

            return redirect()->route('product.index')->with('warning', 'Transaction is used!');
        }
    }
}
