<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
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
            'name' => 'required|min:4|max:255|unique:brands',
        ])->validate();

        Brand::create([
            'name' => $request->name,
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand added!');
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
        $brand = Brand::find($id);
        return view('brand.edit', ['brand' => $brand]);
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
            'name' => 'required|min:4|max:255|unique:brands,name,'.$id,

        ])->validate();

        $brand = Brand::find($id);
        $brand->name = $request->name;

        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand updated!');
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

            Brand::destroy($id);
            return redirect()->route('brand.index')->with('success', 'Brand deleted!');

        } catch (QueryException $e) {

            return redirect()->route('brand.index')->with('warning', 'Brand is used!');
        }
        // Brand::destroy($id);

    }
}
