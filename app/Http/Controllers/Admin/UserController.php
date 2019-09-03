<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.users' , compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        if (Auth::user()->id == $user->id){
            return redirect(route('users.index'))->with('error' , 'You Can not Edit your self');
        }

        return view('admin.edituser' , compact('user' , 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->id == $user->id) {
            return redirect(route('users.edit'))->with('error' , 'You Can not Edit your self');
        }
        $user->roles()->sync($request->role);

        return redirect(route('users.index'))->with('msg' , 'The User Has Edited successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id) {
            return redirect(route('users.index'))->with('error' , 'You Can not Edit your self');
        }
        if ($user) {
            $user->roles()->detach();
            User::destroy($user->id);
            return redirect(route('users.index'))->with('msg' , 'The User Has Deleted successfully !');
        }
        return redirect(route('users.index'))->with('error' , 'The User Can not be Deleted');
    }
}
