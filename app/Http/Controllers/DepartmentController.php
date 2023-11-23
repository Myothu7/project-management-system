<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        $departments = Department::all();
        return view("department.index", compact("departments"));
    }
    public function create()
    {
        return view("department.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'remark' => 'required'
        ]);
        Department::create($request->all());
        return redirect('department')->with("upload_success","Upload successfully!");
    }
   
    public function show(string $id)
    {
        $department = Department::find($id);
        return view("department.detail", compact("department"));
    }

   
    public function edit(string $id)
    {
        $department = Department::find($id);
        return view("department.edit", compact("department"));
    }

   
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'remark' => 'required'
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect('department')->with("update_success","Update successfully!");
    }
   
    public function destroy(string $id)
    {
      $department = Department::find($id);
      $department->delete();

      return back()->with('delete','Delete Successfully');
    }
}
