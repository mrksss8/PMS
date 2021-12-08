<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Roles;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        $roles= Roles::all();
        return view('userManagement.users.index',compact('users','roles'));
    }

    public function store(Request $request){

        $user = new User;
        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->firstName = $request->firstName;
        $user->email = $request->email;
        $user->company = $request->company;
        $user->role = $request->role;
        $user->password =  Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index');
    }

    public function delete($id){
        
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->route('user.index');
    }

    public function update(Request $request, $id){
        
        $user = User::findOrfail($id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->save();
        return redirect()->route('user.index');

    }
}
