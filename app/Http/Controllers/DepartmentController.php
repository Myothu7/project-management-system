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
    public function index(Request $request)
    {   
        $departments = Department::all();
        if($request->search_data){
            $departments = Department::filter($request->search_data);
        }
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
        return redirect('department')->with("upload-success","Upload successfully!");
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

        return redirect('department')->with("update-success","Update successfully!");
    }
   
    public function destroy(string $id)
    {  
        $query = Department::query();
        $department = $query->find($id);
        // return $department->employee;

        if(count($department->employee)){
            return back()->with("no-delete","This department have employee can't delete");
        }
        
      $department = $query->find($id);
      $department->delete();
        
      return back()->with('delete-success','Delete Successfully');
    }
}
