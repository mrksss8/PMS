<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Roles;
use App\Model\Permission;

class RolesController extends Controller
{
    public function index(){

        $permissions= Permission::all();
        $roles = Roles::all();
        return view('userManagement.roles.index',compact('roles','permissions'));
    }


    public function store(Request $request){

        $roles = new Roles;
        $roles->name = $request->name;
        $roles->permission = $request->permission;
        $roles->save();

        return redirect()->route('role.index');
    }

    public function delete($id){
        
        $roles = Roles::findorfail($id);
        $roles->delete();

        return redirect()->route('role.index');
    }
}
