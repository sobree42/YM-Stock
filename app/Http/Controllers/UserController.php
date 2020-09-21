<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())
                    ->where('id', '!=', 1)
                    ->get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'phone' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'profile_picture' => 'required|image',
            'password' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ])->validate();

        $filename = $this->getFileName($request->profile_picture);
        $request->profile_picture->move(base_path('public/img'), $filename);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'avatar' => "/img/".$filename,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'Staff added!');
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
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
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
            'phone' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,phone,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'gender' => 'required',
            'password' => 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|nullable|confirmed',
            'profile_picture' => 'image',
            'password_confirmation' => 'required_unless:password,'
        ])->validate();

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        if ($request->profile_picture) {
            $filename = $this->getFileName($request->profile_picture);
            $request->profile_picture->move(base_path('public/img'), $filename);

            $user->avatar = "/img/".$filename;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'Staff updated!');
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

            User::destroy($id);
            return redirect()->route('user.index')->with('success', 'Staff deleted!');

        } catch (QueryException $e) {
            return redirect()->route('user.index')->with('warning', 'Staff is used!');
        }
    }

    protected function getFileName($file)
    {
    return Str::random(32) . '.' . $file->extension();
    }
}
