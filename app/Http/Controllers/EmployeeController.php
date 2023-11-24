<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {   
        $users = User::where('user_type','=','employee')->get();
        if($request->search_data){
            $users = User::filter($request->search_data);
            // return $users;
        }
        return view('employee.index',compact('users'));
    }
   
    public function create()
    {
        $departments = Department::all();
        return view('employee.create',compact('departments'));
    }
   
    public function store(Request $request)
    {   
        $input_data = $request->all();
        $input_data['password'] = Hash::make($request->password);
        $user = User::create($input_data);
        $user->assignRole('member');
        if($user){
            Employee::create([
                'user_id' => $user->id,
                'department_id' => $request->department_id,
                'role' => $request->role,
                'ph_number' => $request->ph_number,
                'address' => $request->address,
                'image' => $request->image
            ]); 
        }
        return redirect()->route('employee.index')->with('account-success', 'Account Create Successfully!');

    }
   
    public function show(string $id)
    {
        $user = User::find($id);
        $de_id = $user->employee->department_id;
        // dd($de_id);
        $department = Department::where('id',$de_id)->get('name');
        return view('employee.detail', compact('user', 'department'));
    }
   
    public function edit(string $id)
    {
        $user = User::find($id);
        $departments = Department::all();
        return view('employee.edit',compact('user','departments'));
    }
  
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);
        $user->update($request->all());

        $employee = Employee::where('user_id','=',$id);
        $employee->update([
            'role' => $request->role,
            'department_id' => $request->department_id,
            'address' => $request->address,
            'image' => $request->image
        ]);

        return redirect()->route('employee.index')
                         ->with('update-success', 'Update Successfully!');
    }
    
    public function destroy($id)
    {  
        $user = User::find($id);
        $user->delete();
        $employee = Employee::where('user_id','=',$id);
        $employee->delete();
        return back()->with('delete-success', 'Delete Successfully!');
    }
}
