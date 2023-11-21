<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //     $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //     $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }
   
    public function index()
    {
        $roles = Role::all();
        $num = 1;
        return view('role.index',compact('roles','num'));
    }
   
    public function create()
    {
        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create(['name'=>$request->name]);
        $role->syncPermissions($request->permission);

        return back()->with('upload-success','Upload Successfully!');

    }
   
    public function show(string $id)
    {
        //
    }
    
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view('role.edit',compact('role','permissions','rolePermissions'));
    }
   
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required',
        ]);
        
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permission);
       
        return redirect()->route('role.index')->with('update-success','Update Successfully!');
    }

    
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('delete-success', 'Delete Successfully!');
    }
}
