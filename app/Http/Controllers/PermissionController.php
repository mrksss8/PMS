<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Permission;

class PermissionController extends Controller
{
    public function index(){

        $permissions = Permission::all();
        return view('userManagement.permission.index',compact('permissions'));
    }


    public function store(Request $request){

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('permission.index');
    }

    public function delete($id){
        
        $permission = Permission::findorfail($id);
        $permission->delete();

        return redirect()->route('permission.index');
    }
}
