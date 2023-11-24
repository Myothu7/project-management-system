<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-detail', ['only' => ['show']]);
    }
    public function index(Request $request)
    {
        $users = User::where('user_type','=','admin')->paginate(10);

        $position = [];
        foreach($users as $user){
            foreach($user->getRoleNames() as $role){
                array_push( $position,$role);
            }
        }
        if($request->search_data){
           $users = User::user_filter($request->search_data);
        }
        return view('user.index',compact('users','position'));
    }
    
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('user.create',compact('roles'));
    }
   
    public function store(UserRequest $request)
    {
        $input_data = $request->all();
        $input_data['password'] = Hash::make($request->password);
        $users = User::create($input_data);
        $users->assignRole($request->role);

        return redirect()->route('users.index')
                         ->with('upload-success', 'Upload Successfully!');

    }
   
    public function show(string $id)
    {
        $user = User::find($id);
        return view('user.detail', compact('user'));
    }
   
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('user.edit',compact('user', 'roles'));
    }
  
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $user = User::find($id);
        $user->update($request->all());
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->role);

        return redirect()->route('users.index')
                         ->with('update-success', 'Update Successfully!');
    }
    
    public function destroy($id)
    {  
        $user = User::find($id);
        $user->delete();
        return back()->with('delete-success', 'Delete Successfully!');
    }
}
