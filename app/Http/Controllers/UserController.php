<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //orders by name in table
        $users =  User::with('roles')->get(); //orderBy('name')->get();//all();
        //need to create a view in resources folder called index.blade.php
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::orderBy('name')->get();
        $roles = Role::orderBy('name')->get();
        return view('users.create', compact(['users','roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email','max:255'],
            'password' => ['required', 'max:255']
           // 'role'
        ]);

        //puts new record in database
        //save the data as a new country
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password)

        ])->roles()->sync($request->role_ids);
        // ask controller to redirect back to index route
        // gets updated list
        return redirect(route('users.index'))->with('status', 'User has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $userFound = User::find($user->id);
        return view('users.show', compact('userFound'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //validation
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email' . $user->id,'max:255'],
//            'password' => ['required', 'max:255']
            // 'role'
        ]);
        //save changes
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save(); // perform a sql UPDATE

        return redirect(route('users.index'))->with('status', 'User has been changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect(route('users.index'))->with('status', 'User has been deleted!');
    }
}
