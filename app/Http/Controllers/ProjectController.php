<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Project::query();
        $find = $request->search_data;
        if($find){
            $query = Project::where('name','like','%'.$find.'%')
                                ->orWhere('description','like','%'.$find."%")
                                ->orWhere('version','like','%'.$find.'%');
        }
        $projects = $query->get();
        return view('project.index', ['projects'=>$projects]);
    }

    public function create()
    {
        return view('project.create');
    }
    
    public function store(Request $request)
    {
        $project = Project::create($request->all());

        return redirect()->route('projects.index')
                         ->with('upload-success', 'Upload Successfully');
    }
  
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('project.detail',['project'=>$project]);
    }
    
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('project.edit',['project'=>$project]);
    }
   
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        $project->update($request->all());  
        
        return redirect()->route('projects.index')
                         ->with('update-success', 'Update Successfully');
    }
   
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('projects.index')
                         ->with('delete-success', 'Delete Successfully');

    }
}
