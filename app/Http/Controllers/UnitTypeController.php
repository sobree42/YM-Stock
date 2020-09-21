<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\UnitType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class UnitTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit_types = UnitType::all();
        return view('unit_type.index', ['unit_types' => $unit_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit_type.create');
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
            'type' => 'required|unique:unit_types',

        ])->validate();

        UnitType::create([
            'type' => $request->type,
        ]);

        return redirect()->route('unit_type.index')->with('success', 'Unit Type added!');
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
        $unit_type = UnitType::find($id);
        return view('unit_type.edit', ['unit_type' => $unit_type]);
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
            'type' => 'required',

        ])->validate();

        $unit_type = UnitType::find($id);
        $unit_type->type = $request->type;

        $unit_type->save();

        return redirect()->route('unit_type.index')->with('success', 'Unit Type updated!');
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

            UnitType::destroy($id);

             return redirect()->route('unit_type.index')->with('success', 'Unit Type deleted!');
        } catch (QueryException $e) {

            return redirect()->route('unit_type.index')->with('warning', 'Unit Type is used!');
        }

    }
}
