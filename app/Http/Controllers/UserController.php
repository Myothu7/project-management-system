<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use HasRoles;
    public function index()
    {
        $users = User::all();
        $num = 1;
        return view('user.index',compact('users','num'));
    }
   
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('user.create',compact('roles'));
    }
   
    public function store(Request $request)
    {
        $input_data = $request->all();
        $input_data['password'] = Hash::make($request->password);
        $users = User::create($input_data);
        $users->assignRole($request->role);

        return redirect()->route('users.index');

    }
   
    public function show(string $id)
    {
        //
    }
   
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('user.edit',compact('user', 'roles'));
    }
  
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->role);

        return redirect()->route('users.index');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
