<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function Users(){
        return view('admin.users.users',[
            'users' => User::paginate()
        ]);
    }
    function UserAdd(Request $request){
        $request->validate([
            'name' => ['required', 'max:255', 'min:3', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return back()->with('UserAdd', 'User Added Successfully !');
    }
    function UserEdit($id){
        return view('admin.users.edit-user',[
            'user' => User::findOrFail($id)->first(),
        ]);
    }
    function UserUpdate(Request $request){
        $request->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $user_update = User::findOrFail($request->id);
        $user_update->name = $request->name;
        $user_update->email = $request->email;
        $user_update->save();
        return redirect()->route('Users')->with('success', 'User updated successfully !');
    }
    function UserDelete($delete_id){
        User::findOrFail($delete_id)->delete();
        return back()->with('success', 'User deleted successfull !');
    }
}
