<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions = Permission::paginate(7);
        $num = 1;
        return view('permission.index',compact('permissions','num'));
    }
   
    public function create()
    {
        return view('permission.create');
    }
   
    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->guard_name = 'web';
        $permission->save();
        
        return redirect()->route('permissions.index')->with('upload-success', 'Upload Successfully!');
    }
   
    public function show(string $id)
    {
        //
    }
    
    public function edit(string $id)
    {
        $permission = Permission::findById($id);
        return view('permission.edit', compact('permission'));
    }
    
    public function update(Request $request, string $id)
    {
        $user = Permission::findById($id);
        $user->name = $request->name;
        $user->update();

        return redirect()->route('permissions.index')
                         ->with('update-success', 'Update Successfully!');
    }
    
    public function destroy(string $id)
    {
        $permission = Permission::findById($id);
        $permission->delete();
        return back()->with('delete-success','Delete Sucssfully!');
    }
}
